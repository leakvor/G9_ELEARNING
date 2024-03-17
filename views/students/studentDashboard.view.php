<body>
    <?php
    // session_start()
    ?>
    <!-- Header START -->
    <header class="navbar-light navbar-sticky">
        <!-- Logo Nav START -->
        <nav class="navbar navbar-expand-xl">
            <div class="container">
                <!-- Logo START -->
                <a class="navbar-brand" href="">
                    <img class="light-mode-item navbar-brand-item" src="assets/images/logo.svg" alt="logo">
                    <img class="dark-mode-item navbar-brand-item" src="assets/images/logo-light.svg" alt="logo">
                </a>
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
                </div>
                <!-- Main navbar END -->
                <!-- Profile START -->
                <div class="dropdown ms-1 ms-lg-0">
                    <ul class="dropdown-menu dropdown-animation dropdown-menu-end shadow pt-3" aria-labelledby="profileDropdown">
                        <!-- Profile info -->
                        <!-- Links -->
                        <li><a class="dropdown-item" href="#"><i class="bi bi-person fa-fw me-2"></i>Edit Profile</a>
                        </li>
                        <li><a class="dropdown-item" href="#"><i class="bi bi-gear fa-fw me-2"></i>Account Settings</a>
                        </li>
                        <li><a class="dropdown-item" href="#"><i class="bi bi-info-circle fa-fw me-2"></i>Help</a></li>
                        <li><a class="dropdown-item bg-danger-soft-hover" href="#"><i class="bi bi-power fa-fw me-2"></i>Sign Out</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <!-- Dark mode switch START -->
                        <li>
                            <div class="modeswitch-wrap" id="darkModeSwitch">
                                <div class="modeswitch-item">
                                    <div class="modeswitch-icon"></div>
                                </div>
                                <span>Dark mode</span>
                            </div>
                        </li>
                        <!-- Dark mode switch END -->
                    </ul>
                </div>
                <!-- Profile START -->
            </div>
        </nav>
        <!-- Logo Nav END -->
    </header>

    <!-- Header END -->

    <!-- **************** MAIN CONTENT START **************** -->
    <main>

        <!-- =======================
Page Banner START -->
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
                                <div class="col-auto mt-4 mt-md-0">
                                    <div class="avatar avatar-xxl mt-n3">
                                        <a href="/studentEditprofile"><img class="avatar-img rounded-circle border border-white border-3 shadow" src="assets/images/profile/<?= $user['img'] ?>" alt="studentProfile"></a>
                                    </div>
                                </div>
                                <!-- Profile info -->
                                <div class="col d-md-flex justify-content-between align-items-center mt-4">
                                    <div>
                                        <h1 class="my-1 fs-4"><?= $user['username'] ?><i class="bi bi-patch-check-fill text-info small"></i></h1>
                                        <p><?php echo $user['email'] ?></p>
                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item h6 fw-light me-3 mb-1 mb-sm-0"><i class="fas fa-star text-warning me-2"></i>4.5/5.0</li>
                                            <li class="list-inline-item h6 fw-light me-3 mb-1 mb-sm-0"><i class="fas fa-user-graduate text-orange me-2"></i>12k Enrolled
                                                Students</li>
                                            <li class="list-inline-item h6 fw-light me-3 mb-1 mb-sm-0"><i class="fas fa-book text-purple me-2"></i>25 Courses</li>
                                        </ul>
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
                                            <a class="list-group-item " href=""><i class="bi bi-basket fa-fw me-2"></i>My Courses</a>

                                            <form action="controllers/profiles/trainer.profile.php" method="post" enctype="multipart/form-data">
                                                <ul class="navbar-nav navbar-nav-scroll d-none d-xl-block">
                                                    <li class="nav-item dropdown">
                                                        <button class="list-group-item d-lg-inline-block" href="instructor-edit-profile.html"><i class="bi bi-pencil-square fa-fw me-2"></i>Edit Profile</button>
                                                        <ul class="dropdown-menu dropdown-menu-end min-w-auto">
                                                            <input type="hidden" value="<?php echo $trainer['email'] ?>" name="email">
                                                            <li><input type="file" name="img" class="form-control custom-file-input dropdown-item" id="imageUpload"></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </form>

                                            <a class="list-group-item " href="controllers/students/deleteprofile.controller.php?id=<?= $user['user_id'] ?>"><i class="bi bi-trash fa-fw me-2"></i>Delete Profile</a>
                                            <a onclick="showAlert()" class="list-group-item text-danger bg-danger-soft-hover" href="controllers/logout/logout.controller.php"><i class="fas fa-sign-out-alt fa-fw me-2"></i>Log
                                                Out</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </nav>
                        <!-- Responsive offcanvas body END -->
                    </div>
                    <!-- Right sidebar END -->

                    <!-- Main content START -->
                    <div class="col-xl-9">

                        <!-- Counter boxes START -->
                        <div class="row g-4">
                            <!-- Counter item -->
                            <div class="col-sm-6 col-lg-4">
                                <div class="d-flex justify-content-center align-items-center p-4 bg-warning bg-opacity-15 rounded-3">
                                    <span class="display-6 text-warning mb-0"><i class="fas fa-tv fa-fw"></i></span>
                                    <div class="ms-4">
                                        <div class="d-flex">
                                            <h5 class="purecounter mb-0 fw-bold" data-purecounter-start="0" data-purecounter-end="25" data-purecounter-delay="200">0</h5>
                                        </div>
                                        <span class="mb-0 h6 fw-light">Total Courses</span>
                                    </div>
                                </div>
                            </div>
                            <!-- Counter item -->
                            <div class="col-sm-6 col-lg-4">
                                <div class="d-flex justify-content-center align-items-center p-4 bg-purple bg-opacity-10 rounded-3">
                                    <span class="display-6 text-purple mb-0"><i class="fas fa-user-graduate fa-fw"></i></span>
                                    <div class="ms-4">
                                        <div class="d-flex">
                                            <h5 class="purecounter mb-0 fw-bold" data-purecounter-start="0" data-purecounter-end="25" data-purecounter-delay="200">0</h5>
                                            <span class="mb-0 h5">K+</span>
                                        </div>
                                        <span class="mb-0 h6 fw-light">Total Students</span>
                                    </div>
                                </div>
                            </div>
                            <!-- Counter item -->
                            <div class="col-sm-6 col-lg-4">
                                <div class="d-flex justify-content-center align-items-center p-4 bg-info bg-opacity-10 rounded-3">
                                    <span class="display-6 text-info mb-0"><i class="fas fa-gem fa-fw"></i></span>
                                    <div class="ms-4">
                                        <div class="d-flex">
                                            <h5 class="purecounter mb-0 fw-bold" data-purecounter-start="0" data-purecounter-end="12" data-purecounter-delay="300">0</h5>
                                            <span class="mb-0 h5">K</span>
                                        </div>
                                        <span class="mb-0 h6 fw-light">Enrolled Students</span>
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
                                            <span class="badge bg-dark text-white">Current Month</span>
                                            <h4 class="text-primary my-2">$35000</h4>
                                            <p class="mb-0"><span class="text-success me-1">0.20%<i class="bi bi-arrow-up"></i></span>vs last month</p>
                                        </div>
                                        <!-- Content -->
                                        <div class="col-sm-6 col-md-4">
                                            <span class="badge bg-dark text-white">Last Month</span>
                                            <h4 class="my-2">$28000</h4>
                                            <p class="mb-0"><span class="text-danger me-1">0.10%<i class="bi bi-arrow-down"></i></span>Then last month</p>
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