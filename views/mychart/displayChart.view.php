<body>
	<main>
		<!-- =======================
Page content START -->
		<section class="pt-5">
			<section class="py-0" style="margin-top: 80px;">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<div class="bg-light p-4 text-center rounded-3">
								<h1 class="m-0">My cart</h1>
								<!-- Breadcrumb -->
								<div class="d-flex justify-content-center">
									<nav aria-label="breadcrumb">
										<ol class="breadcrumb breadcrumb-dots mb-0">
											<li class="breadcrumb-item"><a href="#">Home</a></li>
											<li class="breadcrumb-item"><a href="#">Courses</a></li>
											<li class="breadcrumb-item active" aria-current="page">Cart</li>
										</ol>
									</nav>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<div class="container" style="margin-top: 50px;">

				<div class="row g-4 g-sm-5">
					<!-- Main content START -->
					<div class="col-lg-8 mb-4 mb-sm-0">
						<div class="card card-body p-4 shadow">
							<div class="table-responsive border-0 rounded-3">
								<!-- Table START -->
								<table class="table align-middle p-4 mb-0">
									<!-- Table head -->
									<!-- Table body START -->
									<tbody class="border-top-0">
										<?php
										require("database/database.php");
										require("models/​student_course.model.php");
										$user = $_SESSION['user'];
										$allMychart = myChart($user['user_id']); 
										$totalAllcourse=totalAllcourse($user['user_id']);
										?>
										<?php
										foreach ($allMychart as $chart): ?>
											<tr>
												<!-- Course item -->
												<td>
													<div class="d-lg-flex align-items-center">
														<!-- Image -->
														<div class="w-100px w-md-80px mb-2 mb-md-0">
															<img src="../../assets/images/course/<?= $chart['course_img'] ?>"class="rounded" alt="" style="width: 100%; height: 80px; object-fit: cover;">
														</div>
														<!-- Title -->
														<h6 class="mb-0 ms-lg-3 mt-2 mt-lg-0">
															<a href="controllers/mychart/payForcharId.controller.php?id=<?=$chart['course_id']?>&chart_id=<?=$chart['chart_id']?>">
																<?= $chart['title'] ?>
															</a>
														</h6>

													</div>
												</td>
												<td>
													<h6 class="mb-0 ms-lg-3 mt-2 mt-lg-0"><?= $chart['date'] ?>	</h6>
												</td>
												<!-- Amount item -->
												<td class="text-center">
													<h5 class="text-success mb-0">
														<?= $chart['paid'] ?>$
													</h5>
												</td>
												<!-- Action item -->
												<td>
													<a href="controllers/mychart/payForcharId.controller.php?id=<?=$chart['course_id']?>&chart_id=<?=$chart['chart_id']?>" class="btn btn-sm btn-success-soft px-2 mb-0" ><i class="fas fa-arrows-alt" ></i></a>
													<a href="../../controllers/mychart/deleteMychart.controller.php?id=<?=$chart['chart_id']?> "onclick="return functionDelete()" class="btn btn-sm btn-danger-soft px-2 mb-0" ><i class="fas fa-fw fa-times" ></i></a>
												</td>
											</tr>
										<?php endforeach ?>
									</tbody>
								</table>
							</div>
							<!-- Coupon input and button -->
						</div>
					</div>
					<!-- Main content END -->

					<!-- Right sidebar START -->
					<div class="col-lg-4">
						<!-- Card total START -->
						<div class="card card-body p-4 shadow">
							<!-- Title -->
							<h4 class="mb-3">Cart Total</h4>

							<!-- Price and detail -->
							<ul class="list-group list-group-borderless mb-2">
								<li class="list-group-item px-0 d-flex justify-content-between">
									<span class="h5 mb-0">Total:</span>
									<span class="h5 mb-0 text-success"><?=$totalAllcourse?>$</span>
								</li>
							</ul>


						</div>
						<!-- Card total END -->
					</div>
					<!-- Right sidebar END -->

				</div><!-- Row END -->
			</div>
		</section>
		<!-- =======================
Page content END -->

	</main>
	<!-- **************** MAIN CONTENT END **************** -->

	<!-- =======================
Footer START -->
	<footer class="pt-5 bg-light">
		<div class="container">
			<!-- Row START -->
			<div class="row g-4">

				<!-- Widget 1 START -->
				<div class="col-lg-3">
					<!-- logo -->
					<a class="me-0" href="index.html">
						<img class="light-mode-item h-40px" src="assets/images/logo.svg" alt="logo">
						<img class="dark-mode-item h-40px" src="assets/images/logo-light.svg" alt="logo">
					</a>
					<p class="my-3">Eduport education theme, built specifically for the education centers which is
						dedicated to teaching and involve learners. </p>
					<!-- Social media icon -->
					<ul class="list-inline mb-0 mt-3">
						<li class="list-inline-item"> <a class="btn btn-white btn-sm shadow px-2 text-facebook"
								href="#"><i class="fab fa-fw fa-facebook-f"></i></a> </li>
						<li class="list-inline-item"> <a class="btn btn-white btn-sm shadow px-2 text-instagram"
								href="#"><i class="fab fa-fw fa-instagram"></i></a> </li>
						<li class="list-inline-item"> <a class="btn btn-white btn-sm shadow px-2 text-twitter"
								href="#"><i class="fab fa-fw fa-twitter"></i></a> </li>
						<li class="list-inline-item"> <a class="btn btn-white btn-sm shadow px-2 text-linkedin"
								href="#"><i class="fab fa-fw fa-linkedin-in"></i></a> </li>
					</ul>
				</div>
				<!-- Widget 1 END -->

				<!-- Widget 2 START -->
				<div class="col-lg-6">
					<div class="row g-4">
						<!-- Link block -->
						<div class="col-6 col-md-4">
							<h5 class="mb-2 mb-md-4">Company</h5>
							<ul class="nav flex-column">
								<li class="nav-item"><a class="nav-link" href="#">About us</a></li>
								<li class="nav-item"><a class="nav-link" href="#">Contact us</a></li>
								<li class="nav-item"><a class="nav-link" href="#">News and Blogs</a></li>
								<li class="nav-item"><a class="nav-link" href="#">Library</a></li>
								<li class="nav-item"><a class="nav-link" href="#">Career</a></li>
							</ul>
						</div>

						<!-- Link block -->
						<div class="col-6 col-md-4">
							<h5 class="mb-2 mb-md-4">Community</h5>
							<ul class="nav flex-column">
								<li class="nav-item"><a class="nav-link" href="#">Documentation</a></li>
								<li class="nav-item"><a class="nav-link" href="#">Faq</a></li>
								<li class="nav-item"><a class="nav-link" href="#">Forum</a></li>
								<li class="nav-item"><a class="nav-link" href="#">Sitemap</a></li>
							</ul>
						</div>

						<!-- Link block -->
						<div class="col-6 col-md-4">
							<h5 class="mb-2 mb-md-4">Teaching</h5>
							<ul class="nav flex-column">
								<li class="nav-item"><a class="nav-link" href="#">Become a teacher</a></li>
								<li class="nav-item"><a class="nav-link" href="#">How to guide</a></li>
								<li class="nav-item"><a class="nav-link" href="#">Terms &amp; Conditions</a></li>
							</ul>
						</div>
					</div>
				</div>
				<!-- Widget 2 END -->

				<!-- Widget 3 START -->
				<div class="col-lg-3">
					<h5 class="mb-2 mb-md-4">Contact</h5>
					<!-- Time -->
					<p class="mb-2">
						Toll free:<span class="h6 fw-light ms-2">+1234 568 963</span>
						<span class="d-block small">(9:AM to 8:PM IST)</span>
					</p>

					<p class="mb-0">Email:<span class="h6 fw-light ms-2">example@gmail.com</span></p>

					<div class="row g-2 mt-2">
						<!-- Google play store button -->
						<div class="col-6 col-sm-4 col-md-3 col-lg-6">
							<a href="#"> <img src="assets/images/client/google-play.svg" alt=""> </a>
						</div>
						<!-- App store button -->
						<div class="col-6 col-sm-4 col-md-3 col-lg-6">
							<a href="#"> <img src="assets/images/client/app-store.svg" alt="app-store"> </a>
						</div>
					</div> <!-- Row END -->
				</div>
				<!-- Widget 3 END -->
			</div><!-- Row END -->

			<!-- Divider -->
			<hr class="mt-4 mb-0">

			<!-- Bottom footer -->
			<div class="py-3">
				<div class="container px-0">
					<div class="d-lg-flex justify-content-between align-items-center py-3 text-center text-md-left">
						<!-- copyright text -->
						<div class="text-body text-primary-hover"> Copyrights ©2023 Eduport. Build by <a
								href="https://www.webestica.com/" target="_blank" class="text-body">Webestica</a></div>
						<!-- copyright links-->
						<div class="justify-content-center mt-3 mt-lg-0">
							<ul class="nav list-inline justify-content-center mb-0">
								<li class="list-inline-item">
									<!-- Language selector -->
									<div class="dropup mt-0 text-center text-sm-end">
										<a class="dropdown-toggle nav-link" href="#" role="button" id="languageSwitcher"
											data-bs-toggle="dropdown" aria-expanded="false">
											<i class="fas fa-globe me-2"></i>Language
										</a>
										<ul class="dropdown-menu min-w-auto" aria-labelledby="languageSwitcher">
											<li><a class="dropdown-item me-4" href="#"><img class="fa-fw me-2"
														src="assets/images/flags/uk.svg" alt="">English</a></li>
											<li><a class="dropdown-item me-4" href="#"><img class="fa-fw me-2"
														src="assets/images/flags/gr.svg" alt="">German </a></li>
											<li><a class="dropdown-item me-4" href="#"><img class="fa-fw me-2"
														src="assets/images/flags/sp.svg" alt="">French</a></li>
										</ul>
									</div>
								</li>
								<li class="list-inline-item"><a class="nav-link" href="#">Terms of use</a></li>
								<li class="list-inline-item"><a class="nav-link pe-0" href="#">Privacy policy</a></li>
							</ul>
						</div>
					</div>
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
	<script src="assets/vendor/choices/js/choices.min.js"></script>

	<!-- Template Functions -->
	<script src="assets/js/functions.js"></script>


</body>