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
				<div class="row g-4">
					<?php
					require "database/database.php";
					require "models/course.model.php";
					$trainerCourse=trainerCourse($_SESSION['id']);
					if (empty($trainerCourse)) {
						// Display message when $displayCourses is empty
						echo "<h1>This trainer will have Courses Soon....</h1>";
					} else {
						foreach ($trainerCourse as $displayCourse) :
							
					?>
							<!-- Card item START -->
							<div class="col-lg-10 col-xxl-6">
								<div class="card rounded overflow-hidden shadow">
									<div class="row g-0">
										<!-- Image -->
										<div class="col-md-4">
											<img src="assets/images/course/<?= $displayCourse['course_img'] ?>" alt="card image">
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
												<!-- Content -->
												<!-- Info -->
												<ul class="list-inline mb-1">
													<li class="list-inline-item h6 fw-light mb-1 mb-sm-0"><i class="far fa-clock text-danger me-2"></i>6h 56m</li>
													<li class="list-inline-item h6 fw-light mb-1 mb-sm-0"><i class="fas fa-table text-orange me-2"></i>82 lectures</li>
													<li class="list-inline-item h6 fw-light"><i class="fas fa-signal text-success me-2"></i>Beginner</li>
												</ul>
												<!-- Rating -->
												<ul class="list-inline mb-0">
													<li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
													<li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
													<li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
													<li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
													<li class="list-inline-item me-0 small"><i class="fas fa-star-half-alt text-warning"></i></li>
													<li class="list-inline-item ms-2 h6 fw-light">4.5/5.0</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
					<?php
						endforeach;
					}
					?>



				</div>

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