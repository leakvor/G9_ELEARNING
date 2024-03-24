<main>
    <!-- Page Banner START -->
    <section class="bg-dark align-items-center d-flex" style="background:url(assets/images/pattern/04.png) no-repeat center center; background-size:cover;height:330px">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bg-dark p-4 text-center rounded-3">
                        <h1 class="text-white m-0">Instructors list</h1>
                        <div class="d-flex justify-content-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-dark breadcrumb-dots mb-0">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">instructor list</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Page Banner END -->

    <!-- Inner part START -->
    <section class="pt-4">
        <div class="container">
            <div class="row g-4">
                <?php
                $statement = $connection->prepare("select * from users where role='teacher'");
                $statement->execute();
                $teachers = $statement->fetchAll();
                ?>
                <?php foreach ($teachers as $teacher) :
                    if (isset($_SESSION['user'])) {
                        $path = "../../controllers/trainers/trainers.controller.php" . "?id=" . urlencode($teacher['user_id']);
                    } else {
                        $path = "/signins";
                    }
                ?>
                    <!-- Card item START -->
                    <div class="col-lg-10 col-xl-6">
                        <div class="card shadow p-2">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <a href="<?= $path ?>">
                                        <img src="assets/images/instructor/<?= $teacher['img'] ?>" class="rounded-3" alt="img course" style="width: 100%; height: 180px; object-fit: cover;">
                                    </a>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <div class="d-sm-flex justify-content-sm-between mb-2 mb-sm-3">
                                            <div>
                                                <h5 class="card-title" id="Nameteacher"><a href="/trainer-classroom"><?= $teacher['username'] ?></a></h5>
                                            </div>
                                        </div>
                                        <p class="text-truncate-2 mb-3">Perceived end knowledge certainly day sweetness why cordially.</p>
                                        <div class="d-sm-flex justify-content-sm-between align-items-center">
                                            <ul class="list-inline mb-0 mt-3 mt-sm-0">
                                                <li class="list-inline-item">
                                                    <a class="mb-0 me-1 text-facebook" href="#"><i class="fab fa-fw fa-facebook-f"></i></a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a class="mb-0 me-1 text-instagram-gradient" href="#"><i class="fab fa-fw fa-instagram"></i></a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a class="mb-0 me-1 text-twitter" href="#"><i class="fab fa-fw fa-twitter"></i></a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a class="mb-0 text-linkedin" href="#"><i class="fab fa-fw fa-linkedin-in"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
            <!-- Pagination START -->
            <nav class="mt-4 d-flex justify-content-center" aria-label="navigation">
                <ul class="pagination pagination-primary-soft rounded mb-0">
                    <li class="page-item mb-0"><a class="page-link" href="#" tabindex="-1"><i class="fas fa-angle-double-left"></i></a></li>
                    <li class="page-item mb-0"><a class="page-link" href="#">1</a></li>
                    <li class="page-item mb-0 active"><a class="page-link" href="#">2</a></li>
                    <li class="page-item mb-0"><a class="page-link" href="#">..</a></li>
                    <li class="page-item mb-0"><a class="page-link" href="#">6</a></li>
                    <li