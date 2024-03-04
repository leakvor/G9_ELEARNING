<form class="d-none d-md-flex mx-5 " >
  <input class="form-control bg-dark mt-3 mb-3" style="border: 1px solid gray;" type="search" id="search" placeholder="Search">
</form>
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

<?php
$usernameError = "";
$emailError = "";
$passwordError = "";
if (isset($_POST['submit'])){
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  if (empty($username)){
    $usernameError ="username is required";

  }else{
    $username = trim($username);
    $username = htmlspecialchars($username);
    if (!preg_match("/^[a-zA-Z]+$/",$username)){
      $usernameError ="username is not a valid";
  }
}
  if (empty($email)){
    $emailError ="username is required";

  }else{
    $email = trim($email);
    $email = htmlspecialchars($email);
    if (!preg_match("/^[a-z]{4,10}\.[a-z]{1,10}\@[a-z]{2,18}\.[a-z]{1,3}$/",$email)){
      $emailError ="your email is not a valid";
  }
}
  if (empty($password)){
    $passwordError ="your username is required";

  }else{
    $password = trim($password);
    $password = htmlspecialchars($password);
    if (!preg_match("/^[a-zA-Z\d\!\@\#\$\%]{5,8}$/",$password)){
      $passwordError ="your password is not a valid";
  }
}

}
?>

<div class="container-fluid pt-4 px-4" style="overflow-x: auto">
  <button type="button" class="btn btn-primary mb-3 " data-toggle="modal" data-target="#myModal">
    Add new trainer
  </button>
  <!-- The Modal -->
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
                <input type="text" class="form-control bg-white" name="username" placeholder="UserName" id="validationCustom03" required>
              </div>
              <div class="form-group mt-3">
                <input type="email" class="form-control bg-white" name="email" placeholder="Email" id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" required>
                <?php if (isset($emailError)) : ?>
                  <span style="color:red"><?php echo $emailError ?></span>
                <?php endif; ?>

              </div>
              <div class="form-group mt-3">
                <input type="password" class="form-control bg-white" name="password" placeholder="Password" id="password" required>
                <?php if (isset($passwordError)) : ?>
                  <span><?php echo $passwordError ?></span>
                <?php endif; ?>
              </div>
              <div class="form-group mt-3">
                <input type="file" class="form-control bg-white" name="img" placeholder="Choose img">
              </div>
              <button type="submit" class="btn btn-danger mt-3" name="submit" value="submit">Create</button>
            </form>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>


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
                if (confirm("Are you sure you want to delete this category?")) {

                  return true; // Proceed with deletion
                } else {
                  return false; // Cancel deletion
                }
              }
            </script>
            <i class="fas fa-edit editIcon" data-toggle="modal" data-target="#editModal<?= $teacher['user_id'] ?>" style="cursor: pointer;color:blue; margin-top:3px"></i>
            <div class="modal fade" id="editModal<?= $teacher['user_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel<?= $teacher['user_id'] ?>" aria-hidden="true">
              <!-- ---------form edit--------- -->
              <div class="modal-dialog" role="document">
                <div class="modal-content" style="background-color: black; border: 1px solid white;">
                  <div class="modal-header">

                    <?php
                    $statement = $connection->prepare("select * from users where user_id=:id");
                    $statement->execute(
                      [':id' => $teacher['user_id']]
                    );
                    $teacher = $statement->fetch();
                    ?>

                    <h5 class="modal-title" id="editModalLabel">Edit Trainer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="controllers/trainers/trainer.update.controller.php" method="post" enctype="multipart/form-data">
                      <div class="form-group mt-3">
                        <input type="hidden" name="id" value="<?= $teacher['user_id'] ?>">
                        <input type="text" class="form-control bg-white" name="username" placeholder="UserName" value="<?= $teacher['username'] ?>">
                      </div>
                      <div class="form-group mt-3">
                        <input type="text" class="form-control bg-white" name="email" placeholder="Email" value="<?= $teacher['email'] ?>">
                      </div>
                      <div class="form-group mt-3">
                        <!-- <input type="password" class="form-control bg-white" name="password" placeholder="Password" id="password" value=""> -->
                      </div>
                      <div class="form-group mt-3">
                        <input type="file" class="form-control bg-white" name="img" placeholder="Choose img">
                      </div>
                      <button class="btn btn-danger mt-3">Edit</button>
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