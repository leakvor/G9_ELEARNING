<?php
$statement = $connection->prepare("SELECT * FROM category");
$statement->execute();
$categories = $statement->fetchAll();
?>

<body>
	<!-- **************** MAIN CONTENT START **************** -->
	<main>

		<!-- =======================
Page Banner START -->
		<section class="bg-dark align-items-center d-flex" style="background:url(assets/images/pattern/04.png) no-repeat center center; background-size:cover;height:350px">
			<!-- Main banner background image -->
			<div class="container">
				<div class="row">
					<div class="col-12">
						<!-- Title -->
						<h1 class="text-white">Course List</h1>
						<!-- Breadcrumb -->
					</div>
				</div>
			</div>
		</section>
		<!-- =======================
Page Banner END -->

		<!-- =======================
Page content START -->
		<section class="pt-5">
			<div class="container">
				<!-- Search option START -->
				<div class="row mb-4 align-items-center">
					<!-- Search bar -->
					<div class="col-sm-6 col-xl-4">
						<form class="border rounded p-2">
							<div class="input-group input-borderless">
								<input class="form-control me-1" type="search" placeholder="Search course">
								<button type="button" class="btn btn-primary mb-0 rounded"><i class="fas fa-search"></i></button>
							</div>
						</form>
					</div>
				</div>
				<!-- Search option END -->

				<!-- Course list START -->
				<div class="row g-4 ">
					<?php
					require "database/database.php";
					require "models/​student_course.model.php";
					// echo "here";
					if (empty($displayCourses)) {
						// Display message when $displayCourses is empty
						echo "<h1>This page will have Courses Soon....</h1>";
					} else {
						foreach ($displayCourses as $displayCourse) :
							$alredyPay=getcourse_student($_SESSION['user']['user_id'],$displayCourse['course_id'] );
							if(count($alredyPay)>0){
								$path="controllers/lesson/displayLessonEachcourse.controller.php" . "?id=" . urlencode($displayCourse['course_id']);
							}else{
								$path="controllers/students/payId.controller.php". "?id=" . urlencode($displayCourse['course_id']);
							}
					?>
							<!-- Card item START -->
							<div class="col-lg-10 col-xxl-6">
								<div class="card rounded overflow-hidden shadow">
									<div class="row g-0">
										<!-- Image -->
										<div class="col-md-4">
											<a href="<?=$path?>"><img src="assets/images/course/<?= $displayCourse['course_img'] ?>" alt="card image" style="width: 100%; height: 180px; object-fit: cover;"></a>
										</div>
										<!-- Card body -->
										<div class="col-md-8">
											<div class="card-body">
												<!-- Title -->
												<div class="d-flex justify-content-between mb-2">
													<h5 class="card-title mb-0"><a href="#"><?= $displayCourse['title'] ?></a></h5>
													<!-- Wishlist icon -->
													<a href="#"><i class="fas fa-heart text-danger"></i></a>
												</div>
												<h5 style="color: green;"> <?php echo ($displayCourse['paid'] == 0) ? 'Free' : $displayCourse['paid'] . '$'; ?></h5>
											</div>
										</div>
									</div>
								</div>
							</div>
					<?php
						endforeach;
					}
					?>
					<!-- Pagination START -->
					<div class="col-12">
						<nav class="mt-4 d-flex justify-content-center" aria-label="navigation">
							<ul class="pagination pagination-primary-soft d-inline-block d-md-flex rounded mb-0">
								<li class="page-item mb-0"><a class="page-link" href="#" tabindex="-1"><i class="fas fa-angle-double-left"></i></a></li>
								<li class="page-item mb-0"><a class="page-link" href="#">1</a></li>
								<li class="page-item mb-0 active"><a class="page-link" href="#">2</a></li>
								<li class="page-item mb-0"><a class="page-link" href="#">..</a></li>
								<li class="page-item mb-0"><a class="page-link" href="#">6</a></li>
								<li class="page-item mb-0"><a class="page-link" href="#"><i class="fas fa-angle-double-right"></i></a></li>
							</ul>
						</nav>
					</div>
					<!-- Pagination END -->

				</div>
		</section>
		<!-- =======================
Page content END -->

		<!-- =======================
Action box START -->
		



	</main>
	<!-- **************** MAIN CONTENT END **************** -->
	<!-- =======================
Footer END -->

	<!-- Back to top -->
	<div class="back-top"><i class="bi bi-arrow-up-short position-absolute top-50 start-50 translate-middle"></i></div>

	<!-- Bootstrap JS -->
	<script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

	<!-- Vendors -->
	<script src="assets/vendor/choices/js/choices.min.js"></script>

	<!-- Template Functions -->
	<script src="assets/js/functions.js"></script>