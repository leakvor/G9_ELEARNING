<div class="container-fluid pt-4 px-4" style="overflow-x: auto">
  <div class="form-row" style="display: flex; flex-direction: column;">
    <form style="display: flex;">
      <input class="form-control border-1 mt-3 " style="border: 1px solid gray;flex:3.5 " type="search" id="search" placeholder="Search">
      <button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#myModal" style="margin-left:50%;flex:2; height: 40px;">
        Add new trainer
      </button>
    </form>
    <div class="modal" id="myModal">
      <div class="modal-dialog">
        <div class="modal-content" style="background-color: black; border: 1px solid white;">
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Form Add new trainer</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <!-- Modal body -->
          <div class="modal-body ">
            <div class="modal-body">
              <form action="/addTrainer" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                <div class="form-group mt-3">
                  <input type="text" class="form-control bg-white" name="username" placeholder="UserName" id="username" required>
                  <span id="usernameValidationMsg" class="text-danger"></span>
                  <div class="form-group mt-3">
                    <input type="email" class="form-control bg-white" name="email" placeholder="Email" id="email" required>
                    <span id="emailValidationMsg" class="text-danger"></span>
                  </div>
                  <div class="form-group mt-3">
                    <input type="password" class="form-control bg-white" name="password" placeholder="Password" id="password" required>
                    <span id="passwordValidationMsg" class="text-danger"></span>
                  </div>
                  <div class="form-group mt-3">
                    <input type="file" class="form-control bg-white" name="img" placeholder="Choose img">
                  </div>
                  <button type="submit" class="btn btn-danger mt-3" name="submit" id="submitBtn">Create</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--form  edit----->
  <div class="table-wrapper-scroll-y my-custom-scrollbar m-4">
    <table class="table table-dark">
      <thead>
        <tr>
          <th scope="col">id</th>
          <th scope="col">FirstName</th>
          <th scope="col">Email</th>
          <!-- <th scope="col">Password</th> -->
          <th scope="col">Img</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($teachers as $index => $teacher) : ?>
          <tr>
            <th scope="row"><?= $index + 1 ?></th>
            <!-- <td><img src="" alt=""></td> -->
            <td><?= $teacher['username'] ?></td>
            <td><?= $teacher['email'] ?></td>
            <!-- <td><?= $teacher['password'] ?></td> -->
            <td><img src="assets/images/instructor/<?= $teacher['img'] ?>" alt="" style="width: 20%; height: 70px; object-fit: cover;border-radius: 50%;"></td>
            <td class="d-flex d-grid gap-3">
              <a class="btn bg-gradient-danger btn-danger" href="controllers/trainers/trainer.delete.controller.php?id=<?= $teacher['user_id'] ?> " onclick="return functionDelete()">
                <i class="fa fa-trash" style="color:white;"></i></a>
              <a href="#" class="btn bg-gradient-danger btn-info">
                <i class="fas fa-edit editIcon" data-toggle="modal" data-target="#editModal<?= $teacher['user_id'] ?>" style="cursor: pointer;color:white; margin-top:3px"></i>
              </a>
              <div class="modal fade" id="editModal<?= $teacher['user_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel<?= $teacher['user_id'] ?>" aria-hidden="true">
                <?php
                $id = $teacher['user_id'];
                $username = $teacher['username'];
                $email = $teacher['email'];
                $password = $teacher['password'];
                ?>
                <!-- Edit form HTML -->
                <div class="modal-dialog" role="document">
                  <div class="modal-content" style="background-color: black; border: 1px solid white;">
                    <div class="modal-header">
                      <h5 class="modal-title" id="editModalLabel">Edit Trainer</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form action="controllers/trainers/trainer.update.controller.php" method="post" enctype="multipart/form-data" class="needs-validation">
                        <div class="form-group mt-3">
                          <input type="hidden" name="id" value="<?= $id ?>">
                          <input type="text" class="form-control bg-white" name="username" placeholder="UserName" id="username" required value="<?= $username ?>">
                          <span id="usernameValidationMsg" class="text-danger"></span>
                        </div>
                        <div class="form-group mt-3">
                          <input type="email" class="form-control bg-white" name="email" placeholder="Email" id="email" required value="<?= $email ?>">
                          <span id="emailValidationMsg" class="text-danger"></span>
                        </div>
                        <div class="form-group mt-3">
                          <input type="hidden" class="form-control bg-white" name="password" placeholder="Password" id="password" required value="<?= $password ?>">
                          <span id="passwordValidationMsg" class="text-danger"></span>
                        </div>
                        <div class="form-group mt-3">
                          <input type="file" class="form-control bg-white" name="img" placeholder="Choose img">
                        </div>
                        <button type="submit" class="btn btn-danger mt-3" name="submit">Edit</button>
                    </div>
                    </form>
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