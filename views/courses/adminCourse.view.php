<?php
require "database/database.php";
require "models/trainer.model.php";
require "models/category.model.php";
// require "models/course.model.php";
$teachers=getTeacher();
$categories= getCategorys();

?>
<div class="container-fluid pt-4 px-4">
  <div style="display: flex;flex-direction: column;">
  <div style="display: flex; justify-content: space-between;">
  <input class="form-control bg-dark border-1  border-white mt-3 mr-3" type="search" id="search" placeholder="Search" style="width: 200px;">
    <select name="category" class="form-control bg-dark border-1  border-white mt-3 mr-3" style="width: 200px;">
      <option value="#">Select by Category</option>
      <?php foreach ($categories as $category) : ?>
        <option value="<?= $category['cateName'] ?>"><?= $category['cateName'] ?></option>
      <?php endforeach ?>
    </select>
    <select name="teacher" class="form-control bg-dark border-1  border-white mt-3 mr-3" style="width: 200px;">>
      <option value="#">Choose Teacher</option>
      <?php foreach ($teachers as $teacher) : ?>
        <option value="<?= $teacher['username'] ?>"><?= $teacher['username'] ?></option>
      <?php endforeach ?>
    </select>
  </div>
    <button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#myModal" style="margin-left:80%;"> Add new Course</button>
  </div>


  <div class="container-fluid pt-2 px-4" style="overflow-x: auto">



    <!-- The Modal -->
    <div class="modal" id="myModal">
      <div class="modal-dialog">
        <div class="modal-content" style="background-color: black; border: 1px solid white;">
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Form Add new course</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <form action="/addCourse" method="post" enctype="multipart/form-data">
              <div class="form-group mt-3">
                <input type="text" class="form-control bg-white" name="title" placeholder="Title" id="title">
                <span id="titleValidationMsg" class="text-danger"></span> <!-- Validation message for Title -->
              </div>
              <div class="form-group mt-3">
                <input type="number" class="form-control bg-white" name="paid" placeholder="Paid">
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
                <span id="categoryValidationMsg" class="text-danger"></span>
              </div>

              <div class="form-group mt-3">
                <input type="file" class="form-control bg-white" name="img" placeholder="Choose img">
              </div>
              <button type="submit" id="submitBtn" class="btn btn-danger mt-3" disabled>Create</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="table-wrapper-scroll-y my-custom-scrollbar mt-3">
    <table class="table table-dark">
      <thead>
        <tr>
          <th scope="col">id</th>
          <th scope="col">Title</th>
          <th scope="col">Teacher</th>
          <th scope="col">Category</th>
          <th scope="col">Picture</th>
          <th scope="col">Paid</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($courses as $index => $course) :

        ?>
          <!-- <div class="btn bg-gradient-danger btn-danger"><i class="fas fa-fw fa-trash"></i></div> -->
          <tr>
            <th scope="row"><?= $index + 1 ?></th>
            <td><?= $course['title'] ?></td>
            <td><?= $course['username'] ?></td>
            <td><?= $course['cateName'] ?></td>
            <td><img src="assets/images/course/<?= $course['course_img'] ?>" alt="" style="width: 30%; height: 90px; object-fit: cover;"></td>
            <td><?= $course['paid'] ?>$</td>
            <td><a href="controllers/courses/deleteCourse.controller.php?id=<?= $course['course_id'] ?>" class="btn bg-gradient-danger btn-danger" onclick="return functionDelete()">
                <i class="fa fa-trash" style="color:white;"></i></a>
            
              <a href="#" class="btn bg-gradient-danger btn-info">
                <i class="fas fa-edit editIcon" data-toggle="modal" data-target="#editModal<?= $course['course_id'] ?>" style="cursor: pointer;color:white;"></i>
              </a>
              <div class="modal fade" id="editModal<?= $course['course_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel<?= $course['course_id'] ?>" aria-hidden="true">
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
                      $course=displayCourseid($course['course_id']);
                      ?>
                      <form action="controllers/courses/updateCourse.controller.php" method="post" enctype="multipart/form-data">
                        <div class="form-group mt-3">
                          <input type="hidden" class="form-control bg-white" name="id" placeholder="Title" value="<?= $course['course_id'] ?>">
                        </div>
                        <div class="form-group mt-3">
                          <input type="text" class="form-control bg-white" name="title" placeholder="Title" value="<?= $course['title'] ?>">
                        </div>
                        <div class="form-group mt-3">
                          <input type="number" class="form-control bg-white" name="paid" placeholder="Title" value="<?= $course['paid'] ?>">
                        </div>
                        <div class="form-group mt-3">
                          <select name="teacher" class="form-control bg-white">
                            <!-- <option value="">Choose Teacher</option> -->
                            <?php foreach ($teachers as $teacher) : ?>
                              <?php $selected = ($course['user_id'] == $teacher['user_id']) ? 'selected' : ''; ?>
                              <option value="<?= $teacher['user_id'] ?>" <?= $selected ?>>
                                <?= $teacher['username'] ?>
                              </option>
                            <?php endforeach ?>
                          </select>
                        </div>
                        <div class="form-group mt-3">
                          <select name="category" class="form-control bg-white">
                            <!-- <option value="">Choose Category</option> -->
                            <?php foreach ($categories as $category) : ?>
                              <?php $selected = ($course['cate_id'] == $category['cat_id']) ? 'selected' : ''; ?>
                              <option value="<?= $category['cat_id'] ?>" <?= $selected ?>>
                                <?= $category['cateName'] ?>
                              </option>
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