<div class="container-fluid pt-4 px-4">
  <div class="container-fluid pt-2 px-4" style="overflow-x: auto">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"> Add new Course</button>

    <!-- The Modal -->
    <div class="modal" id="myModal">
      <div class="modal-dialog">
        <div class="modal-content" style="background-color: black; border: 1px solid white;">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Form Add new course</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <?php
          require "database/database.php";
          $statement = $connection->prepare("select * from users where role='teacher'");
          $statement->execute();
          $teachers = $statement->fetchAll();

          $statement = $connection->prepare("select * from category");
          $statement->execute();
          $categories = $statement->fetchAll();
          ?>
          <!-- Modal body -->
          <div class="modal-body">
            <form action="/addCourse" method="post" enctype="multipart/form-data">
              <div class="form-group mt-3">
                <input type="text" class="form-control bg-white" name="title" placeholder="Title">
              </div>
              <div class="form-group mt-3">
                <select name="teacher" class="form-control bg-white">
                  <option value="#">Choose Teacher</option>
                  <?php foreach ($teachers as $teacher) : ?>
                    <option value="<?= $teacher['user_id'] ?>"><?= $teacher['username'] ?></option>
                  <?php endforeach ?>
                </select>
              </div>
              <div class="form-group mt-3">
                <select name="category" class="form-control bg-white">
                  <option value="#">Choose Category</option>
                  <?php foreach ($categories as $category) : ?>
                    <option value="<?= $category['cat_id'] ?>"><?= $category['cateName'] ?></option>
                  <?php endforeach ?>
                </select>
              </div>

              <div class="form-group mt-3">
                <input type="file" class="form-control bg-white" name="img" placeholder="Choose img">
              </div>
              <button class="btn btn-danger mt-3">Create</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="table-wrapper-scroll-y my-custom-scrollbar">
    <table class="table table-bordered table-striped mb-0">
      <thead>
        <tr>
          <th scope="col">id</th>
          <th scope="col">Title</th>
          <th scope="col">Teacher</th>
          <th scope="col">Category</th>
          <th scope="col">Picture</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($courses as $course) : ?>
          <tr>
            <th scope="row"><?= $course['course_id'] ?></th>
            <td><?= $course['title'] ?></td>
            <td><?= $course['username'] ?></td>
            <td><?= $course['cateName'] ?></td>
            <td><img src="assets/images/course/<?= $course['img'] ?>" alt="" width="50px" style="border-radius: 50%;"></td>
            <td><a href="controllers/courses/deleteCourse.controller.php?id=<?= $course['course_id'] ?>" style="color: black;"><i class="fa fa-trash" style="color:red;"></i></a>
              <i id="editIcon" class="fas fa-edit" style="cursor: pointer;color:blue;"></i>
              <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content" style="background-color: black; border: 1px solid white;">
                    <div class="modal-header">
                      <h5 class="modal-title" id="editModalLabel">Edit Course</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <?php
                      $statement = $connection->prepare("SELECT course.course_id, course.img, course.title, users.username,category.cateName FROM course INNER JOIN category ON category.cat_id=course.cate_id inner join users on users.user_id=course.user_id where course_id=:id;");
                      $statement->execute(
                        [':id' => $course['course_id']],
                      );
                      $course = $statement->fetch();
                      // var_dump($course['img'])
                      ?>
                      <form action="controllers/courses/updateCourse.controller.php" method="post" enctype="multipart/form-data">
                        <div class="form-group mt-3">
                          <input type="hidden" class="form-control bg-white" name="id" placeholder="Title" value="<?= $course['course_id'] ?>">
                        </div>
                        <div class="form-group mt-3">
                          <input type="text" class="form-control bg-white" name="title" placeholder="Title" value="<?= $course['title'] ?>">
                        </div>
                        <div class="form-group mt-3">
                          <select name="teacher" class="form-control bg-white">
                            <option value="<?= $course['username'] ?>"><?= $course['username'] ?></option>
                            <?php foreach ($teachers as $teacher) : ?>
                              <option value="<?= $teacher['user_id'] ?>"><?= $teacher['username'] ?></option>
                            <?php endforeach ?>
                          </select>
                        </div>
                        <div class="form-group mt-3">
                          <select name="category" class="form-control bg-white">
                            <option value="<?= $course['cateName'] ?>"><?= $course['cateName'] ?></option>
                            <?php foreach ($categories as $category) : ?>
                              <option value="<?= $category['cat_id'] ?>"><?= $course['cateName'] ?></option>
                            <?php endforeach ?>
                          </select>
                        </div>
                        <div class="form-group mt-3">
                          <input type="file" class="form-control bg-white" name="img" placeholder="Choose img">
                        </div>
                        <button class="btn btn-danger mt-3">Edit</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>

            </td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
</div>
</div>

<script>
  $(document).ready(function() {
    $("#editIcon").click(function() {
      $("#editModal").modal('show');
    });
  });
</script>