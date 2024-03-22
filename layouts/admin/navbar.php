 <!-- Sidebar Start -->
 <?php
    if (isset($_SESSION['admin'])) {
        $admin = $_SESSION['admin'];
        $adminname = strtoupper($admin['username']);
    } else {
        $adminname = "Unknown";
    }
    ?>
 <?php
    $URL = $_SERVER['REQUEST_URI'];
    if ($URL == '/admins') {
        $activeAdmin = 'active';
        $activeTrainer = '';
        $activeStudent = '';
        $activeCourse = '';
        $activeCategiry = '';
    } else if ($URL == '/adminTrainer') {
        $activeTrainer = 'active';
        $activeAdmin = '';
        $activeStudent = '';
        $activeCategiry = '';
        $activeCourse = '';
    } else if ($URL == '/displayStudent') {
        $activeStudent = 'active';
        $activeAdmin = '';
        $activeTrainer = '';
        $activeCategiry = '';
        $activeCourse = '';
    } else if ($URL == '/displayCategory') {
        $activeCategiry = 'active';
        $activeStudent = '';
        $activeAdmin = '';
        $activeTrainer = '';
        $activeCourse = '';
    } else if ($URL == '/adminCourse') {
        $activeCourse = 'active';
        $activeCategiry = '';
        $activeStudent = '';
        $activeAdmin = '';
        $activeTrainer = '';
    }

    ?>




 <div class="sidebar pe-4 pb-3">
     <nav class="navbar bg-secondary navbar-dark">
         <a href="index.html" class="navbar-brand mx-4 mb-3">
             <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>DarkPan</h3>
         </a>
         <div class="d-flex align-items-center ms-4 mb-4">
             <div class="position-relative">
                 <img class="rounded-circle" src="assets/images/avatar/photo.jpg" alt="" style="width: 40px; height: 40px;">
                 <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
             </div>
             <div class="ms-3">
                 <h6 class="mb-0"><?= $adminname ?></h6>
                 <span>Admin</span>
             </div>
         </div>
         <div class="navbar-nav w-100">
             <?php
                if (isset($_SESSION['admin'])) {
                    $dasboad = '/admins';
                    $teacherPath = "/adminTrainer";
                    $studentPath = "/displayStudent";
                    $categories = "/displayCategory";
                    $admincourse = "/adminCourse";
                } else {
                    $dasboad = '/admin';
                    $teacherPath = "/admin";
                    $studentPath = "/admin";
                    $categories = "/admin";
                    $admincourse = "/admin";
                }
                ?>
             <a href="<?php echo $dasboad ?>" class="nav-item nav-link <?= $activeAdmin ?>"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
             <a href="<?php echo $teacherPath ?>" class="nav-item nav-link <?= $activeTrainer ?>"><i class="fas fa-chalkboard-teacher me-2"></i>Teachers</a>
             <a href="<?php echo $studentPath ?>" class="nav-item nav-link <?= $activeStudent ?>"><i class="fa fa-user me-2"></i>Students</a>
             <a href="<?php echo $categories ?>" class="nav-item nav-link <?= $activeCategiry ?>"><i class="far fa-folder-open me-2"></i>Categories</a>
             <a href="/payadmin" class="nav-item nav-link "><i class="far fa-folder-open me-2"></i>Payment</a>
             <a href="<?php echo $admincourse ?>" class="nav-item nav-link <?= $activeCourse ?>"><i class="fas fa-book me-2"></i>Course</a>
             <div class="nav-item dropdown">
                 <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Pages</a>
                 <div class="dropdown-menu bg-transparent border-0">
                     <a href="signin.html" class="dropdown-item">Sign In</a>
                     <a href="signup.html" class="dropdown-item">Sign Up</a>
                 </div>
             </div>
         </div>
 </div>
 </nav>
 </div>
 <!-- Sidebar End -->
 <!-- Content Start -->
 <div class="content">
     <!-- Navbar Start -->
     <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
         <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">

             <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
         </a>
         <a href="#" class="sidebar-toggler flex-shrink-0">
             <i class="fa fa-bars"></i>
         </a>
         <!-- <form class="d-none d-md-flex ms-4" id="searchForm" action="/addTrainer" method="GET" enctype="multipart/form-data">
             <input type="text" name="search" id="searchInput" class="form-control" placeholder="Searh " aria-label="FirstName" aria-describedby="basic-addon1">
         </form> -->
         <div class="navbar-nav align-items-center ms-auto">
             <div class="nav-item dropdown">
                 <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                     <i class="fa fa-envelope me-lg-2"></i>
                     <span class="d-none d-lg-inline-flex">Message</span>
                 </a>
                 <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                     <a href="#" class="dropdown-item">
                         <div class="d-flex align-items-center">
                             <img class="rounded-circle" src="assets/images/user.jpg" alt="" style="width: 40px; height: 40px;">
                             <div class="ms-2">
                                 <h6 class="fw-normal mb-0"><?= strtolower($adminname) ?> send you a message</h6>
                                 <small>15 minutes ago</small>
                             </div>
                         </div>
                     </a>
                     <hr class="dropdown-divider">
                     <a href="#" class="dropdown-item">
                         <div class="d-flex align-items-center">
                             <img class="rounded-circle" src="assets/images/user.jpg" alt="" style="width: 40px; height: 40px;">
                             <div class="ms-2">
                                 <h6 class="fw-normal mb-0"><?= strtolower($adminname) ?> send you a message</h6>
                                 <small>15 minutes ago</small>
                             </div>
                         </div>
                     </a>
                     <hr class="dropdown-divider">
                     <a href="#" class="dropdown-item">
                         <div class="d-flex align-items-center">
                             <img class="rounded-circle" src="assets/images/user.jpg" alt="" style="width: 40px; height: 40px;">
                             <div class="ms-2">
                                 <h6 class="fw-normal mb-0"><?= strtolower($adminname) ?> send you a message</h6>
                                 <small>15 minutes ago</small>
                             </div>
                         </div>
                     </a>
                     <hr class="dropdown-divider">
                     <a href="#" class="dropdown-item text-center">See all message</a>
                 </div>
             </div>
             <div class="nav-item dropdown">
                 <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                     <i class="fa fa-bell me-lg-2"></i>
                     <span class="d-none d-lg-inline-flex">Notificatin</span>
                 </a>
                 <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                     <a href="#" class="dropdown-item">
                         <h6 class="fw-normal mb-0">Profile updated</h6>
                         <small>15 minutes ago</small>
                     </a>
                     <hr class="dropdown-divider">
                     <a href="#" class="dropdown-item">
                         <h6 class="fw-normal mb-0">New user added</h6>
                         <small>15 minutes ago</small>
                     </a>
                     <hr class="dropdown-divider">
                     <a href="#" class="dropdown-item">
                         <h6 class="fw-normal mb-0">Password changed</h6>
                         <small>15 minutes ago</small>
                     </a>
                     <hr class="dropdown-divider">
                     <a href="#" class="dropdown-item text-center">See all notifications</a>
                 </div>
             </div>
             <div class="nav-item dropdown">
                 <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                     <img class="rounded-circle me-lg-2" src="assets/images/avatar/photo.jpg" alt="" style="width: 40px; height: 40px;">
                     <span class="d-none d-lg-inline-flex"><?= $adminname ?></span>
                 </a>
                 <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                     <a href="#" class="dropdown-item">My Profile</a>
                     <a href="#" class="dropdown-item">Settings</a>
                     <a href="controllers/logout/logout.controller.php" class="dropdown-item">Log Out</a>
                 </div>
             </div>
         </div>
     </nav>
     <!-- Navbar End -->