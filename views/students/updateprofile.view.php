
<body>

<!-- Header START -->
<header class="navbar-light navbar-sticky">
  <!-- Logo Nav START -->
  <nav class="navbar navbar-expand-xl">
    <div class="container">
      <!-- Logo START -->
      <a class="navbar-brand" href="index.html">
        <img class="light-mode-item navbar-brand-item" src="assets/images/logo.svg" alt="logo">
        <img class="dark-mode-item navbar-brand-item" src="assets/images/logo-light.svg" alt="logo">
      </a>
      <!-- Logo END -->

      <!-- Responsive navbar toggler -->
      <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-animation">
          <span></span>
          <span></span>
          <span></span>
        </span>
      </button>

      <!-- Main navbar START -->
      <div class="navbar-collapse w-100 collapse" id="navbarCollapse">
        <ul class="dropdown-menu dropdown-animation dropdown-menu-end shadow pt-3" aria-labelledby="profileDropdown">
          <!-- Profile info -->
          <li class="px-3 mb-3">
            <div class="d-flex align-items-center">
              <!-- Avatar -->
              <div class="avatar me-3">
                <img class="avatar-img rounded-circle shadow" src="assets/images/avatar/01.jpg" alt="avatar">
              </div>
              <div>
                <a class="h6" href="#">Lori Ferguson</a>
                <p class="small m-0">example@gmail.com</p>
              </div>
            </div>
          </li>
          <li> <hr class="dropdown-divider"></li>
          <!-- Links -->
          <li><a class="dropdown-item" href="#"><i class="bi bi-person fa-fw me-2"></i>Edit Profile</a></li>
          <li><a class="dropdown-item" href="#"><i class="bi bi-gear fa-fw me-2"></i>Account Settings</a></li>
          <li><a class="dropdown-item" href="#"><i class="bi bi-info-circle fa-fw me-2"></i>Help</a></li>
          <li><a class="dropdown-item bg-danger-soft-hover" href="#"><i class="bi bi-power fa-fw me-2"></i>Sign Out</a></li>
          <li> <hr class="dropdown-divider"></li>
          <!-- Dark mode options START -->
          <li>
            <div class="bg-light dark-mode-switch theme-icon-active d-flex align-items-center p-1 rounded mt-2">
              <button type="button" class="btn btn-sm mb-0 active" data-bs-theme-value="light">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sun fa-fw mode-switch" viewBox="0 0 16 16">
                  <path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"></path>
                  <use href="#"></use>
                </svg> Light
              </button>
              <button type="button" class="btn btn-sm mb-0" data-bs-theme-value="dark">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-moon-stars fa-fw mode-switch" viewBox="0 0 16 16">

            <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278zM4.858 1.311A7.269 7.269 0 0 0 1.025 7.71c0 4.02 3.279 7.276 7.319 7.276a7.316 7.316 0 0 0 5.205-2.162c-.337.042-.68.063-1.029.063-4.61 0-8.343-3.714-8.343-8.29 0-1.167.242-2.278.681-3.286z"></path>
                  <path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z"></path>
                  <use href="#"></use>
                </svg> Dark
              </button>
              <button type="button" class="btn btn-sm mb-0" data-bs-theme-value="auto">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-circle-half fa-fw mode-switch" viewBox="0 0 16 16">
                  <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z"></path>
                  <use href="#"></use>
                </svg> Auto
              </button>
            </div>
          </li> 
          <!-- Dark mode options END-->
        </ul>
      </div>
      <!-- Profile START -->
    </div>
  </nav>
  <!-- Logo Nav END -->
</header><div id="sticky-space"></div>
<!-- Header END -->

<!-- **************** MAIN CONTENT START **************** -->
<main>
  
<!-- =======================Page Banner START -->
<section class="pt-0">
  <!-- Main banner background image -->
  <div class="container-fluid px-0">
    <div class="bg-blue h-100px h-md-200px rounded-0" style="background:url(assets/images/pattern/04.png) no-repeat center center; background-size:cover;">
    </div>
  </div>
  <div class="container mt-n4">
    <div class="row">
      <!-- Profile banner START -->
      <div class="col-12">
        <div class="card bg-transparent card-body p-0">
          <div class="row d-flex justify-content-between">
            <!-- Avatar -->
            <!-- =========================================pic Students================== -->
            <!-- get start session -->
              <?php
                if (isset($_SESSION['user'])){
                  // var_dump($_SESSION['user']);
              ?>
            <?php 
            // require 'models/student.model.php';
            // $username = accountExist($user['email']);
            // var_dump($user['email']);
            // echo('hello word')
            // if (isset($username)){
            //   $newUsername = $username['username'];
            // }else{
            //   $newUsername = '';
            // }
            ?>
            <div class="col-auto mt-4 mt-md-0">
              <div class="avatar avatar-xxl mt-n3">
                <a href="/studentDashboard"><img class="avatar-img rounded-circle border border-white border-3 shadow" src="assets/images/profile/<?=$profileImg?>" alt="studentProfile"></a>
              </div>
            </div>
            <!-- Profile info -->
            <div class="col d-md-flex justify-content-between align-items-center mt-4">
              <div>
                <h1 class="my-1 fs-4"><?=$nextUser['username']?><i class="bi bi-patch-check-fill text-info small"></i></h1>
                <p><?=$nextUser['email'] ?></p>
                <ul class="list-inline mb-0">
                  <li class="list-inline-item h6 fw-light me-3 mb-1 mb-sm-0"><i class="fas fa-star text-warning me-2"></i>4.5/5.0</li>
                  <li class="list-inline-item h6 fw-light me-3 mb-1 mb-sm-0"><i class="fas fa-user-graduate text-orange me-2"></i>12k Enrolled Students</li>
                  <li class="list-inline-item h6 fw-light me-3 mb-1 mb-sm-0"><i class="fas fa-book text-purple me-2"></i>25 Courses</li>
                </ul>
              </div>
              <!-- Button -->
            </div>
          </div>
        </div>
        <!-- Profile banner END -->
        <!-- Advanced filter responsive toggler START -->
        <!-- Divider -->
        <hr class="d-xl-none">
        <div class="col-12 col-xl-3 d-flex justify-content-between align-items-center">
          <a class="h6 mb-0 fw-bold d-xl-none" href="#">Menu</a>
          <button class="btn btn-primary d-xl-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSidebar" aria-controls="offcanvasSidebar">
            <i class="fas fa-sliders-h"></i>
          </button>
        </div>
        <!-- Advanced filter responsive toggler END -->
      </div>
    </div>
  </div>
</section>
<!-- =======================
Page Banner END -->

<!-- =======================
Page content START -->
<section class="pt-0">
  <div class="container">
    <div class="row">

      <!-- Left sidebar START -->
      <div class="col-xl-3">
        <!-- Responsive offcanvas body START -->
        <div class="offcanvas-body p-3 p-xl-0">
            <div class="bg-dark border rounded-3 pb-0 p-3 w-100">
              <!-- Dashboard menu -->
              <div class="list-group list-group-dark list-group-borderless">
                <a class="list-group-item active" href="instructor-edit-profile.html"><i class="bi bi-pencil-square fa-fw me-2"></i>Edit Profile</a>
                <a class="list-group-item" href="instructor-delete-account.html"><i class="bi bi-trash fa-fw me-2"></i>Delete Profile</a>
                <a class="list-group-item text-danger bg-danger-soft-hover" href="sign-in.html"><i class="fas fa-sign-out-alt fa-fw me-2"></i>Sign Out</a>
              </div>
            </div>
          </div>
        <!-- Responsive offcanvas body END -->
      </div>
      <!-- Left sidebar END -->

      <!-- Main content START -->
      <div class="col-xl-9">
        <!-- Edit profile START -->
        <div class="card bg-transparent border rounded-3">
          <!-- <a href="controllers/profiles/profile.controller.php"> -->
                      <!-- Card header -->
          <div class="card-header bg-transparent border-bottom">
            <h3 class="card-header-title mb-0">Edit Profile</h3>
          </div>
          <!-- Card body START -->
          <div class="card-body">
            <!-- Form -->
            <form action="controllers/profiles/updateprofile.controller.php"  method="post" class="row g-4">

              <!-- Profile picture -->
              <div class="col-12 justify-content-center align-items-center">
                <label class="form-label">Profile picture</label>
                <div class="d-flex align-items-center">
                  <label class="position-relative me-4" for="uploadfile-1" title="Replace this pic">
                    <!-- Avatar place holder -->
                    <span class="avatar avatar-xl">
                      <img id="imageUpload" class="avatar-img rounded-circle border border-white border-3 shadow" src="assets/images/profile/<?=$profileImg?>"  alt="">
                    </span>
                    <!-- Remove btn -->
                    <button type="button" class="uploadremove"><i class="bi bi-x text-white"></i></button>
                  </label>
                  <!-- Upload button -->
                  <label class="btn btn-primary-soft mb-0 editProfile" for="uploadfile-1">Change</label>
                  <input id="uploadfile-1" class="form-control d-none" type="file">

                </div>
              </div>
              <input type="hidden" value="<?= $user['user_id']?>" name="user_id">
              <!-- Username -->
              <div class="col-md-6">
                <label class="form-label">Username</label>
                <div class="input-group">
                  <!-- <span class="input-group-text">Eduport.com</span> -->
                  <input type="text" class="form-control" value="<?=$nextUser['username']?>" name="username">
                  <!-- <?php var_dump($user['username']) ?> -->
                </div>
              </div>

              <!-- Email id -->
              <div class="col-md-6">
                <label class="form-label">Email</label>
                <input class="form-control" type="email" name="email" value="<?= $nextUser['email'] ?>" placeholder="Email">
              </div>
              <!-- Save button -->
              <div class="d-sm-flex justify-content-end">
                <button type="submit" class="btn btn-primary mb-0 editProfile">Save changes</button>
              </div>
            </form>
          </div>
          <!-- Card body END -->
        </div>
        <!-- Edit profile END -->
        

      <!-- Main content END -->
    </div><!-- Row END -->
  </div>
      <?php }?>
</section>
<!-- =======================
Page content END -->

</main>
<!-- **************** MAIN CONTENT END **************** -->

<!-- =======================
Footer START -->
<footer class="bg-dark p-3">
  <div class="container">
    <div class="row align-items-center">
      <!-- Widget -->
      <div class="col-md-4 text-center text-md-start mb-3 mb-md-0">
        <!-- Logo START -->
        <a href="index.html"> <img class="h-20px" src="assets/images/logo-light.svg" alt="logo"> </a>
      </div>
      
      <!-- Widget -->
      <div class="col-md-4 mb-3 mb-md-0">
        <div class="text-center text-white text-primary-hover">
          Copyrights ©2023 Eduport. Build by <a href="https://www.webestica.com/" target="_blank" class="text-white">Webestica</a>.
        </div>
      </div>
      <!-- Widget -->
      <div class="col-md-4">
        <!-- Rating -->
        <ul class="list-inline mb-0 text-center text-md-end">
          <li class="list-inline-item ms-2"><a href="#"><i class="text-white fab fa-facebook"></i></a></li>
          <li class="list-inline-item ms-2"><a href="#"><i class="text-white fab fa-instagram"></i></a></li>
          <li class="list-inline-item ms-2"><a href="#"><i class="text-white fab fa-linkedin-in"></i></a></li>
          <li class="list-inline-item ms-2"><a href="#"><i class="text-white fab fa-twitter"></i></a></li>
        </ul>
      </div>
    </div>
  </div>
</footer>
<!-- =======================
Footer END -->

<!-- Back to top -->
<div class="back-top"><i class="bi bi-arrow-up-short position-absolute top-50 start-50 translate-middle"></i></div>

<!-- Bootstrap JS -->
<script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<!-- Template Functions -->
<script src="assets/js/functions.js"></script>

<!-- ===================validation===================== -->

</body>