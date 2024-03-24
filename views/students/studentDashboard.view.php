<body>
    <?php
    require "database/database.php";
    require "models/payment.model.php";
     ?>
    
    <!-- **************** MAIN CONTENT START **************** -->
    <main>

        <!-- Page Banner START -->
        <section class="pt-0">
            <!-- Main banner background image -->
            <div class="container-fluid px-0" >
                <div class="bg-blue h-1000px h-md-200px rounded-0" style="background:url(assets/images/pattern/04.png) no-repeat center center; background-size:cover; height: 1000px;">
                </div>
            </div>
            <div class="container mt-n4">
                <div class="row">
                    <!-- Profile banner START -->
                    <div class="col-12">
                        <div class="card bg-transparent card-body p-0">
                            <div class="row d-flex justify-content-between">
                                <!-- Avatar -->
                                <div class="col-auto mt-4 mt-md-0">
                                    <div class="avatar avatar-xxl mt-n3">
                                        <a href="/updateprofile"><img class="avatar-img rounded-circle border border-white border-3 shadow" src="../../assets/images/instructor/<?=$profileImg?>" alt="studentProfile"></a>
                                    </div>
                                </div>
                                <!-- Profile info -->
                                <div class="col d-md-flex justify-content-between align-items-center mt-4">
                                    <div>
                                        <h1 class="my-1 fs-4"><?= $profile['username'] ?><i class="bi bi-patch-check-fill text-info small"></i></h1>
                                        <p><?php echo $user['email'] ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Profile banner END -->

                        <!-- Advanced filter responsive toggler START -->
                        <!-- Divider -->
                        <hr class="d-xl-none">
                        <div class="col-12 col-xl-3 d-flex justify-content-between align-items-center">
                            <a class="h6 mb-0 fw-bold d-xl-none" href="#">Menu</a>
                            <button class="btn btn-primary d-xl-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
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
                    <!-- Right sidebar START -->
                    <div class="col-xl-3">
                        <!-- Responsive offcanvas body START -->
                        <nav class="navbar navbar-light navbar-expand-xl mx-0">
                            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                                <!-- Offcanvas header -->
                                <div class="offcanvas-header bg-light">
                                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">My profile</h5>
                                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                </div>
                                <!-- Offcanvas body -->
                                <div class="offcanvas-body p-3 p-xl-0">
                                    <div class="bg-dark border rounded-3 pb-0 p-3 w-100">
                                        <!-- Dashboard menu -->
                                        <div class="list-group list-group-dark list-group-borderless">
                                            <a class="list-group-item " href="#"><i class="bi bi-ui-checks-grid fa-fw me-2"></i>Dashboard</a>
                                            <form action="controllers/profiles/trainer.profile.php" method="post" enctype="multipart/form-data">
                                                <!-- <ul class="navbar-nav navbar-nav-scroll d-none d-xl-block">
                                                    <li class="nav-item dropdown">
                                                        <button class="list-group-item d-lg-inline-block" href="instructor-edit-profile.html"><i class="bi bi-pencil-square fa-fw me-2"></i>Edit Profile</button>
                                                        <ul class="dropdown-menu dropdown-menu-end min-w-auto">
                                                            <input type="hidden" value="<?php echo $trainer['email'] ?>" name="email">
                                                            <li><input type="file" name="img" class="form-control custom-file-input dropdown-item" id="imageUpload"></li>
                                                        </ul>
                                                    </li>
                                                </ul> -->
                                            </form>
                                            <a class="list-group-item " href="/applyTrainer"><i class="fa fa-angle-double-right me-2"></i>Apply for trainer</a>
                                            <a class="list-group-item " href="/studentReview"><i class="fab fa-facebook-messenger me-2" ></i>Message</a>
                                            <a onclick="showAlert()" class="list-group-item text-danger bg-danger-soft-hover" href="controllers/logout/logout.controller.php"><i class="fas fa-sign-out-alt fa-fw me-2"></i>Log
                                                Out</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </nav>
                    </div>
                    <?php 
                    require "database/database.php";
                    require "models/payment.model.php";
                    $id=$_SESSION['user']['user_id'];
                    $totalToday=totalTodayStudent($id);
                    $totalAll=totalAllpaidStudent($id);
                    $totalCourse=totalCourse($id);
                     ?>
                    <div class="col-xl-9">
                        <div class="row g-4">
                            <!-- Counter item -->
                            <div class="col-sm-6 col-lg-4">
                                <div class="d-flex justify-content-center align-items-center p-4 bg-warning bg-opacity-15 rounded-3">
                                    <span class="display-6 text-warning mb-0"><i class="fas fa-tv fa-fw"></i></span>
                                    <div class="ms-4">
                                        <div class="d-flex">
                                            <h5 class="purecounter mb-0 fw-bold" data-purecounter-start="0" data-purecounter-end="<?=$totalCourse['total_course']?>" data-purecounter-delay="200">0</h5>
                                        </div>
                                        <span class="mb-0 h6 fw-light">Total Courses</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Counter boxes END -->

                        <!-- Chart START -->
                        <div class="row mt-5">
                            <div class="col-12">
                                <div class="card card-body border p-4 h-100">
                                    <div class="row g-4">
                                        <!-- Content -->
                                        <div class="col-sm-6 col-md-4">
                                            <span class="badge bg-dark text-white">Total Today</span>
                                            <h4 class="text-primary my-2"><?= $totalToday['total_paid_today'] !== null ? $totalToday['total_paid_today'] : '0' ?>$</h4>
                                        </div>
                                        
                                        <div class="col-sm-6 col-md-4">
                                            <span class="badge bg-dark text-white">Total All</span>
                                            <h4 class="text-primary my-2"><?= $totalAll['total_paid'] !== null ? $totalAll['total_paid'] : '0' ?>$</h4>
                                        </div>
                                    </div>

                                    <!-- Apex chart -->
                                    <div id="ChartPayout"></div>

                                </div>
                            </div>
                        </div>
                        <!-- Chart END -->
                                    </div>
                                    <!-- Card body START -->
                                </div>
                            </div>
                        </div>
                        <!-- Course List table END -->
                    </div>
                    <!-- Card body START -->
                </div>
            </div>
            </div>
            <!-- Course List table END -->
            </div>
            <!-- Main content END -->
            </div><!-- Row END -->
            </div>
        </section>
        <!-- =======================
        Page content END -->

    </main>

    <!-- Back to top -->
    <div class="back-top"><i class="bi bi-arrow-up-short position-absolute top-50 start-50 translate-middle"></i></div>

    <!-- Bootstrap JS -->
    <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Vendors -->
    <script src="assets/vendor/purecounterjs/dist/purecounter_vanilla.js"></script>
    <script src="assets/vendor/apexcharts/js/apexcharts.min.js"></script>

    <!-- Template Functions -->
    <script src="assets/js/functions.js"></script>

    <script>
        function showAlert() {
            alert("<?php echo 'you will signout?'; ?>");
        }
    </script>

</body>

</html>