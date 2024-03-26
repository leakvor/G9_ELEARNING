<body>
    <main>
        <!-- Main Banner START -->
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
                                <?php
                                require("database/database.php");
                                require("models/trainer.model.php");
                                $allStudent = $_SESSION['student'];
                                $profile = $_SESSION['trainer'];
                                $countPreStudent = countCoursesPerStudent($profile['user_id']);
                                ?>
                                <div class="col-auto mt-4 mt-md-0">
                                    <div class="avatar avatar-xxl mt-n3">
                                        <img class="avatar-img rounded-circle border border-white border-3 shadow" src="../../assets/images/instructor/<?= $profile['img'] ?>" alt="">
                                    </div>
                                </div>
                                <!-- Profile info -->
                                <div class="col d-md-flex justify-content-between align-items-center mt-4">
                                    <div>
                                        <h1 class="my-1 fs-4"><?= $profile['username'] ?> <i class="bi bi-patch-check-fill text-info small"></i></h1>
                                        <p><?= $profile['email'] ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Divider -->
                        <hr class="d-xl-none">
                    </div>
                </div>
            </div>
        </section>
        <!-- Inner part START -->
        <section class="pt-0">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3">
                        <nav class="navbar navbar-light navbar-expand-xl mx-0">
                            <!-- Responsive offcanvas body START -->
                            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                                <!-- Offcanvas body -->
                                <div class="offcanvas-body p-3 p-xl-0">
                                    <div class="bg-dark border rounded-3 pb-0 p-3 w-100">
                                        <div class="list-group list-group-dark list-group-borderless">
                                            <a class="list-group-item" href="/trainerdashboard"><i class="bi bi-ui-checks-grid fa-fw me-2"></i>Dashboard</a>
                                            <a class="list-group-item active" href="instructor-studentlist.html"><i class="bi bi-people fa-fw me-2"></i>Students</a>
                                            <a class="list-group-item text-danger bg-danger-soft-hover" href="controllers/logout/logout.controller.php"><i class="fas fa-sign-out-alt fa-fw me-2"></i>Sign Out</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <!-- Main content START -->
                    <div class="col-xl-9">
                        <!-- Card START -->
                        <div class="card border bg-transparent rounded-3">
                            <!-- Card header START -->
                            <div class="card-header bg-transparent border-bottom">
                                <h3 class="mb-0">My Students List</h3>
                            </div>
                            <!-- Student list table START -->
                            <div class="table-responsive border-0">
                                <table class="table table-dark-gray align-middle p-4 mb-0 table-hover">
                                    <!-- Table head -->
                                    <thead>
                                        <tr>
                                            <th scope="col" class="border-0 rounded-start">Student name</th>
                                            <th scope="col" class="border-0">Email</th>
                                            <th scope="col" class="border-0">Courses</th>
                                            <th scope="col" class="border-0">Enrolled date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($countPreStudent as $student) : ?>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center position-relative">
                                                        <!-- Image -->
                                                        <div class="avatar avatar-md mb-2 mb-md-0">
                                                            <img src="../../assets/images/instructor/<?= $student['img'] ?>" class="rounded" alt="" style="width: 100%; height: 60px; object-fit: cover;">
                                                        </div>
                                                        <div class="mb-0 ms-2">
                                                            <h6 class="mb-0"><?= $student['username'] ?></h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <!-- Table data -->
                                                <td class="text-center text-sm-start">
                                                    <div class=" overflow-hidden">
                                                        <h6 class="mb-0"><?= $student['email'] ?></h6>
                                                    </div>
                                                </td>
                                                <!-- Table data -->
                                                <td> <span><?= $student['course_count'] ?></span></td>
                                                <td><?= $student['date'] ?></td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>
    </main>
    <!-- Back to top -->
    <div class="back-top back-top-show"><i class="bi bi-arrow-up-short position-absolute top-50 start-50 translate-middle"></i></div>

    <!-- Bootstrap JS -->
    <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Vendors -->
    <script src="assets/vendor/choices/js/choices.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>

    <!-- Template Functions -->
    <script src="assets/js/functions.js"></script>
</body>