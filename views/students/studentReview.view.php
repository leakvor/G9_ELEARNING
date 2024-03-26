<body>
    <main>
        <!-- Main Banner START -->
        <section class="pt-0">
            <div class="container-fluid px-0">
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
                                        <a href="/updateprofile"><img class="avatar-img rounded-circle border border-white border-3 shadow" src="assets/images/instructor/<?= $profileImg ?>" alt="studentProfile"></a>
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
        <!-- Inner part START -->
        <section class="pt-0">
            <div class="container">
                <div class="row">
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
                                                <a class="list-group-item " href="/studentDashboard"><i class="bi bi-ui-checks-grid fa-fw me-2"></i>Dashboard</a>
                                                <a class="list-group-item " href="/applyTrainer"><i class="fa fa-angle-double-right me-2"></i>Apply for trainer</a>
                                                <a class="list-group-item " href="#"><i class="fab fa-facebook-messenger me-2"></i>Message</a>
                                                <a onclick="showAlert()" class="list-group-item text-danger bg-danger-soft-hover" href="controllers/logout/logout.controller.php"><i class="fas fa-sign-out-alt fa-fw me-2"></i>Log
                                                    Out</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <?php
                        require "database/database.php";
                        require "models/applyTrainer.model.php";
                        $messageUsers = getmessage($_SESSION['user']['user_id']);
                        ?>
                        <div class="col-xl-9">
                            <!-- Student review START -->
                            <div class="card border bg-transparent rounded-3">
                                <div class="card-header bg-transparent border-bottom">
                                    <div class="row justify-content-between align-middle">
                                        <div class="col-sm-6">
                                            <h3 class="card-header-title mb-2 mb-sm-0">Message</h3>
                                        </div>
                                    </div>
                                </div>
                                <!-- Reviews START -->
                                <div class="card-body mt-2 mt-sm-4">
                                    <?php
                                    if (empty($messageUsers)) {
                                        echo "<h1>No message</h1>";
                                    } else {
                                        foreach ($messageUsers as $messageUser) :
                                    ?>
                                            <div class="d-sm-flex">

                                                <div>
                                                    <div class="mb-3 d-sm-flex justify-content-sm-between align-items-center">
                                                        <div>
                                                            <h5 class="m-0">Admin</h5>
                                                        </div>
                                                    </div>
                                                    <h3><span class="text-body fw-light"><?= $messageUser['title'] ?></span></h3>
                                                    <p><?= $messageUser['message'] ?></p>
                                                </div>
                                            </div>
                                            <hr>
                                    <?php endforeach;
                                    }
                                    ?>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
        </section>
    </main>
</body>