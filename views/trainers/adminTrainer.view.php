<form class="d-none d-md-flex mx-5 ">
  <input class="form-control bg-dark mt-3 mb-3" style="border: 1px solid gray;" type="search" id="search" placeholder="Search">
</form>


<script>
  document.addEventListener('DOMContentLoaded', function() {
    let usernameInput = document.querySelector("#username");
    let emailInput = document.querySelector("#email");
    let passwordInput = document.querySelector("#password");
    let submitBtn = document.querySelector("#submitBtn");
    let usernameValidationMsg = document.querySelector("#usernameValidationMsg");
    let emailValidationMsg = document.querySelector("#emailValidationMsg");
    let passwordValidationMsg = document.querySelector("#passwordValidationMsg");

    usernameInput.addEventListener("input", validateUsername);
    emailInput.addEventListener("input", validateEmail);
    passwordInput.addEventListener("input", validatePassword);

    function validateUsername() {
      let usernameText = usernameInput.value.trim();
      let usernameRegex = /^[a-zA-Z\s]{4,}$/;
      let isValid = usernameRegex.test(usernameText);
      if (isValid) {
        usernameValidationMsg.textContent = "";
      } else {
        usernameValidationMsg.textContent = "Please enter a valid username";
      }
      validateForm();
    }

    function validateEmail() {
      let emailText = emailInput.value.trim();
      let emailRegex =  "/^[a-z\.]{4,20}\@[a-z\.]{2,40}\.[a-z]{1,3}$/";
      let isValid = emailRegex.test(emailText);
      if (isValid) {
        emailValidationMsg.textContent = "";
      } else {
        emailValidationMsg.textContent = "Please enter a valid email address";
      }
      validateForm();
    }



    function validatePassword() {
      let passwordText = passwordInput.value.trim();
      let isValid = passwordText.length == 8;
      if (isValid) {
        passwordValidationMsg.textContent = "";
      } else {
        passwordValidationMsg.textContent = "Password must be at least 8 characters";
      }
      validateForm();
    }

    function validateForm() {
      let isUsernameValid = usernameValidationMsg.textContent === "";
      let isEmailValid = emailValidationMsg.textContent === "";
      let isPasswordValid = passwordValidationMsg.textContent === "";
      if (isUsernameValid && isEmailValid && isPasswordValid) {
        submitBtn.removeAttribute("disabled");
      } else {
        submitBtn.setAttribute("disabled", "true");
      }
    }
  });
</script>


<div class="container-fluid pt-4 px-4" style="overflow-x: auto">
  <button type="button" class="btn btn-primary mb-3 " data-toggle="modal" data-target="#myModal">
    Add new trainer
  </button>
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
  <table class="table table-bordered table-striped mb-0" style="border: 1px solid gray;">
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
          <td><img src="assets/images/instructor/<?= $teacher['img'] ?>" alt="" style="width: 50px;height: 50px;object-fit: cover; border-radius: 50%;"></td>
          <td class="d-flex d-grid gap-3">
            <a href="controllers/trainers/trainer.delete.controller.php?id=<?= $teacher['user_id'] ?> " onclick="return functionDelete()">
              <i class="fa fa-trash" style="color:red;"></i></a>
            <script>
              function functionDelete() {
                if (confirm("Are you sure you want to delete this category?")) {return true; 
                } else {
                  return false;
                }
              }
            </script>
            <i class="fas fa-edit editIcon" data-toggle="modal" data-target="#editModal<?= $teacher['user_id'] ?>" style="cursor: pointer;color:blue; margin-top:3px"></i>
            <div class="modal fade" id="editModal<?= $teacher['user_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel<?= $teacher['user_id'] ?>" aria-hidden="true">
              <?php
              $id = $teacher['user_id'];
              $username = $teacher['username'];
              $email = $teacher['email'];
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
                        <input type="text" class="form-control bg-white" name="username" placeholder="UserName" id="username" required>
                        <span id="usernameValidationMsg" class="text-danger"></span>
                      </div>
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

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.querySelector('#search');
    console.log(searchInput.value);
    const tableRows = document.querySelectorAll('tbody tr');
    console.log(tableRows);

    searchInput.addEventListener('input', function() {
      const searchTerm = searchInput.value.trim().toLowerCase();
      console.log(searchTerm);
      tableRows.forEach(function(row) {
        const name = row.cells[1].textContent.trim().toLowerCase();

        if (name.includes(searchTerm)) {
          row.style.display = '';
        } else {
          row.style.display = 'none';
        }
      });
    });
  });
</script>