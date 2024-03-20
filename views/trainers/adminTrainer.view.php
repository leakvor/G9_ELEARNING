
<<<<<<< HEAD
<div class="container-fluid pt-4 px-4" style="overflow-x: auto">
<div class="form-row" style="display: flex; flex-direction: column;">
  <form style="display: flex;">
    <input class="form-control border-1 mt-3 " style="border: 1px solid gray;flex:3.5 " type="search" id="search" placeholder="Search">
    <button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#myModal" style="margin-left:50%;flex:2; height: 40px;" >
    Add new trainer
  </button>
  </form>
=======
<div class="container-fluid pt-2 px-4" style="overflow-x: auto">

  <!-- <a href="/addTrainer" class="btn btn-danger">Add new trainer</a> -->
<script>
  (function() {
    'use strict';
    // $usernameError = "";
    // $emailError = "";
    // $passwordError = "";
    let regex_email = /^[a-z]{4,10}\.[a-z]{1,10}\@[a-z]{2,18}\.[a-z]{1,3}$/;
    let $regex_password = "/^[a-zA-Z\d\!\@\#\$\%]{5,8}$/";

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    let forms = document.querySelectorAll('.needs-validation');

    // Loop  prevent submission
    Array.prototype.slice.call(forms)
      .forEach(function(form) {
        form.addEventListener('submit', function(event) {
          // Validate email
          let emailInput = form.querySelector('input[name="email"]');
          let email = emailInput.value.trim();
          if (!regex_email.test(email)) {
            alert("Invalid email format. Please enter a valid email address.");
            emailInput.focus();
            event.preventDefault();
            event.stopPropagation();
            return false;
          }

          // Validate password strength
          let passwordInput = form.querySelector('input[name="password"]');
          let password = passwordInput.value.trim();
          if (password.length = "/^[a-zA-Z\d\!\@\#\$\%]{5,8}$/".test(password)) {
            alert("Password must be at least 8 characters long and include at least one lowercase letter, one uppercase letter, one digit, and one special character.");
            passwordInput.focus();
            event.preventDefault();
            event.stopPropagation();
            return false;
          }

          // form is valid allow form submission
          if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
  })();
</script>


<div class="container-fluid pt-4 px-4" style="overflow-x: auto">
  <button type="button" class="btn btn-primary mb-3 " data-toggle="modal" data-target="#myModal">
    Add new trainer
  </button>
  <!-- The Modal -->
>>>>>>> trainer_page
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
                  <input type="email" class="form-control bg-white" name="email" placeholder="Email" id="email"  required>
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
<!-- --------------------------------form  edit---------------------------------------- -->
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
          <td><img src="assets/images/instructor/<?= $teacher['img'] ?>" alt=""  style="width: 20%; height: 70px; object-fit: cover;border-radius: 50%;"></td>
          <td class="d-flex d-grid gap-3">
<<<<<<< HEAD
            <a class="btn bg-gradient-danger btn-danger" href="controllers/trainers/trainer.delete.controller.php?id=<?= $teacher['user_id'] ?> " onclick="return functionDelete()">
              <i class="fa fa-trash" style="color:white;"></i></a>
              <a href="#" class="btn bg-gradient-danger btn-info">
              <i class="fas fa-edit editIcon" data-toggle="modal" data-target="#editModal<?= $teacher['user_id'] ?>" style="cursor: pointer;color:white; margin-top:3px"></i>
              </a>
=======
            <a href="controllers/trainers/trainer.delete.controller.php?id=<?= $teacher['user_id'] ?> " onclick="return functionDelete()">
              <i class="fa fa-trash" style="color:red;"></i></a>
            <script>
              function functionDelete() {
                if (confirm("Are you sure you want to delete this category?")) {

                  return true; // Proceed with deletion
                } else {
                  return false; // Cancel deletion
                }
              }
            </script>
            <i class="fas fa-edit editIcon" data-toggle="modal" data-target="#editModal<?= $teacher['user_id'] ?>" style="cursor: pointer;color:blue; margin-top:3px"></i>
>>>>>>> trainer_page
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
                        <input type="text" class="form-control bg-white" name="username" placeholder="UserName" id="username" required value="<?=$username?>">
                        <span id="usernameValidationMsg" class="text-danger"></span>
                      </div>
                      <div class="form-group mt-3">
                        <input type="email" class="form-control bg-white" name="email" placeholder="Email" id="email" required value="<?=$email?>">
                        <span id="emailValidationMsg" class="text-danger"></span>
                      </div>
                      <div class="form-group mt-3">
                        <input type="hidden" class="form-control bg-white" name="password" placeholder="Password" id="password" required value="<?=$password?>">
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


