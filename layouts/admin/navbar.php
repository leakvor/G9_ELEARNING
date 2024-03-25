 <!-- Sidebar Start -->
 <?php
    require('database/database.php');
    require('models/notifi.model.php');
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
    } else if ($URL == '/payadmin') {
        $activepay = 'active';
        $activeCategiry = '';
        $activeStudent = '';
        $activeAdmin = '';
        $activeTrainer = '';
    } else if ($URL == '/admin') {
        $activedashboard = 'active';
        $activeCategiry = '';
        $activeStudent = '';
        $activeAdmin = '';
        $activeTrainer = '';
    } else if ($URL == '/applytoTrainer') {
        $activeapply = 'active';
        $activeCategiry = '';
        $activeStudent = '';
        $activeAdmin = '';
        $activeTrainer = '';
    }

    $notifications = notifi();

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
                    $dasboad = '/admin';
                    $teacherPath = "/adminTrainer";
                    $studentPath = "/displayStudent";
                    $categories = "/displayCategory";
                    $admincourse = "/adminCourse";
                    $adminpayment = "/payadmin";
                    $applyTrainer = "/applytoTrainer";
                } else {
                    $dasboad = '/admin';
                    $teacherPath = "/admin";
                    $studentPath = "/admin";
                    $categories = "/admin";
                    $admincourse = "/admin";
                }
                ?>
             <a href="<?php echo $dasboad ?>" class="nav-item nav-link <?= $activedashboard ?>"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
             <a href="<?php echo $teacherPath ?>" class="nav-item nav-link <?= $activeTrainer ?>"><i class="fas fa-chalkboard-teacher me-2"></i>Teachers</a>
             <a href="<?php echo $studentPath ?>" class="nav-item nav-link <?= $activeStudent ?>"><i class="fa fa-user me-2"></i>Students</a>
             <a href="<?php echo $categories ?>" class="nav-item nav-link <?= $activeCategiry ?>"><i class="far fa-folder-open me-2"></i>Categories</a>
             <a href="<?php echo  $adminpayment ?>" class="nav-item nav-link <?= $activepay ?>"><i class="far fa-money-bill-alt me-2"></i>Payment</a>
             <a href="<?php echo $admincourse ?>" class="nav-item nav-link <?= $activeCourse ?>"><i class="fas fa-book me-2"></i>Course</a>
             <a href="<?php echo $applyTrainer ?>" class="nav-item nav-link <?= $activeapply ?>"><i class="fas fa-book me-2"></i>Apply to trainer</a>
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
             <!-- ============================================= -->
             <div class="nav-item dropdown  ">
                 <a href="#" class="nav-link dropdown-toggle " id="notificationDropdown" data-bs-toggle="dropdown">
                     <i class="fa fa-bell me-lg-2 " id="notificationIcon"></i>
                     <span class="d-none d-lg-inline-flex ">Notifications</span>
                 </a>
                 <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom mt-0" id="notification-dropdown">
                     <?php foreach ($notifications as $notification) : ?>
                         <a href="#" class="dropdown-item notification-item">
                             <h6 class="fw-normal mb-0"><?= $notification['student_username'] ?></h6>
                             <small>enrolled in <?= $notification['course_title'] ?></small>
                             <span>
                                 <p><?= $notification['teacher_name'] ?> teaching</p>
                             </span>
                         </a>
                     <?php endforeach; ?>
                     <a href="#" class="dropdown-item text-center show-all-notifications">See all notifications</a>
                 </div>
             </div>







             <!-- =========================================== -->


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