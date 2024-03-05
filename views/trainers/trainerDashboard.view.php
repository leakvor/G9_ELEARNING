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
				<a class="navbar-brand" href="/trainers">
					<img class="light-mode-item navbar-brand-item" src="assets/images/logo.svg" alt="logo">
					<img class="dark-mode-item navbar-brand-item" src="assets/images/logo-light.svg" alt="logo">
				</a>
				<!-- Logo END -->

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
						<li class="px-3">
							<div class="d-flex align-items-center">
								<!-- Avatar -->
								<div class="avatar me-3">
									<img class="avatar-img rounded-circle shadow" src="assets/images/avatar/01.jpg" alt="avatar">
								</div>
								<div>
									<a class="h6" href="#">Lori Ferguson</a>
									<p class="small m-0">example@gmail.com</p>
								</div>
							</div>
							<hr>
						</li>
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

			<!-- php-code__________________ -->
			<?php
				if (isset($_SESSION['trainer'])){
					$trainer = ($_SESSION['trainer']);
					$train_img = $trainer['img'];
				}else{
					echo 'NOT SET!';
				}
				require('database/database.php');
				require('models/student.model.php');
				require('models/trainer.model.php');

				$trainer_email = $trainer['email'];
				$trainer_data = accountExist($trainer_email);
				if (isset($trainer)){
					$trainer_profile = 'assets/images/instructor/' . $trainer_data['img'];
					if (isset($trainer_profile)){
						echo "<script>alert('Edit profile!');</script>";
					}
				}
				
				$tra_student = trainer_students($trainer_email);
				
			?>

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
									<a href="<?= $trainer_profile?>"><img class="avatar-img rounded-circle border border-white border-3 shadow" src="<?= $trainer_profile?>" alt="trainer_profile"></a>
									</div>
								</div>
								<!-- Profile info -->
								<div class="col d-md-flex justify-content-between align-items-center mt-4">
									<div>
										<h1 class="my-1 fs-4"><?= $trainer['username']?><i class="bi bi-patch-check-fill text-info small"></i></h1>
										<p><?php echo $trainer['email']?></p>
										<ul class="list-inline mb-0">
											<li class="list-inline-item h6 fw-light me-3 mb-1 mb-sm-0"><i class="fas fa-star text-warning me-2"></i>4.5/5.0</li>
											<li class="list-inline-item h6 fw-light me-3 mb-1 mb-sm-0"><i class="fas fa-user-graduate text-orange me-2"></i>12k Enrolled
												Students</li>
											<li class="list-inline-item h6 fw-light me-3 mb-1 mb-sm-0"><i class="fas fa-book text-purple me-2"></i>25 Courses</li>
										</ul>
									</div>

									<!-- Button -->
									<div class="d-flex align-items-center mt-2 mt-md-0">
										<a href="/trainer_create_course" class="btn btn-success mb-0">Create a
											course</a>
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
											<a class="list-group-item " href=""><i class="bi bi-ui-checks-grid fa-fw me-2"></i>Dashboard</a>
											<a class="list-group-item " href=""><i class="bi bi-basket fa-fw me-2"></i>My Category</a>
											<a class="list-group-item " href=""><i class="bi bi-basket fa-fw me-2"></i>My Courses</a>
											<a class="list-group-item " href=""><i class="bi bi-graph-up fa-fw me-2"></i>Earnings</a>
											<a class="list-group-item " href=""><i class="bi bi-people fa-fw me-2"></i>Students</a>

											<form action="../../controllers/profiles/trainer.profile.php" method="post" enctype="multipart/form-data">
												<ul class="navbar-nav navbar-nav-scroll d-none d-xl-block">
													<li class="nav-item dropdown">
														<button class="list-group-item d-lg-inline-block" href="instructor-edit-profile.html"><i class="bi bi-pencil-square fa-fw me-2"></i>Edit Profile</button>
														<ul class="dropdown-menu dropdown-menu-end min-w-auto">
															<input type="hidden" value="<?php echo $trainer['email']?>" name="email">
															<li><input type="file" name="img" class="form-control custom-file-input dropdown-item" id="imageUpload"></li>
														</ul>
													</li>
												</ul>	
											</form>

											<a class="list-group-item " href="instructor-delete-account.html"><i class="bi bi-trash fa-fw me-2"></i>Delete Profile</a>
											<a onclick="showAlert()" class="list-group-item text-danger bg-danger-soft-hover" href="controllers/logout/logout.controller.php"><i class="fas fa-sign-out-alt fa-fw me-2"></i>Sign
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
							<div class="col-sm-6 col-lg-4"  id="show_course">
								<div class="d-flex justify-content-center align-items-center p-4 bg-warning bg-opacity-15 rounded-3">
									<span class="display-6 text-warning mb-0"><i class="fas fa-tv fa-fw"></i></span>
									<div class="ms-4">
										<div class="d-flex">
											<h5 class="purecounter mb-0 fw-bold" data-purecounter-start="0" data-purecounter-end="<?= count($tra_student)?>" data-purecounter-delay="200">0</h5>
										</div>
										<span class="mb-0 h6 fw-light">Total Courses</span>
									</div>
								</div>
								<hr class="mt-2 custom-hr active_barc" style="display:none">
							</div>
							<!-- Counter item -->
							<div class="col-sm-6 col-lg-4"  id="show_student">
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
								<hr class="mt-2 custom-hr active_bars" style="display:none">
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

						<!-- display teacher cours name -->
						<div class="d-flex gap-2 mt-3">
							<?php
								foreach($tra_student as $item){
							?>
								<div class="card text-white bg-success mb-3 all_courses" style="max-width: 18rem; display:none">
									<div class="card-header text-white bg-dark"><?= $item['title']?></div>
									<div class="card-body">
										<h5 class="card-title">Secondary card title</h5>
										<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
									</div>
								</div>
							<?php
								}
							?>
						</div>

						<!-- display teacher stuents -->
						<div class="d-flex gap-2 mt-0.5" >
							<?php
								foreach($tra_student as $item){
							?>
								<div class="card text-white bg-primary mb-3 all_student" style="max-width: 18rem; display:none">
									<div class="card-header text-white bg-dark"><?= $item['title']?></div>
									<div class="card-body">
										<h5 class="card-title">Secondary card title</h5>
										<p class="card-text">Some quick example Ytext to build on the card title and make up the bulk of the card's content.</p>
									</div>
								</div>
							<?php
								}
							?>
						</div>


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

						<!-- Course List table START -->
						<div class="row">
							<div class="col-12">
								<div class="card border rounded-3 mt-5">
									<!-- Card header START -->
									<div class="card-header border-bottom">
										<div class="d-sm-flex justify-content-sm-between align-items-center">
											<h3 class="mb-2 mb-sm-0">Most Selling Courses</h3>
											<a href="#" class="btn btn-sm btn-primary-soft mb-0">View all</a>
										</div>
									</div>
									<!-- Card header END -->

									<!-- Card body START -->
									<div class="card-body">
										<div class="table-responsive-lg border-0 rounded-3">
											<!-- Table START -->
											<table class="table table-dark-gray align-middle p-4 mb-0">
												<!-- Table head -->
												<thead>
													<tr>
														<th scope="col" class="border-0 rounded-start">Course Name</th>
														<th scope="col" class="border-0">Selling</th>
														<th scope="col" class="border-0">Amount</th>
														<th scope="col" class="border-0 rounded-end">Action</th>
													</tr>
												</thead>
												<!-- Table body START -->
												<tbody>

													<!-- Table item -->
													<tr>
														<!-- Course item -->
														<td>
															<div class="d-flex align-items-center">
																<!-- Image -->
																<div class="w-100px w-md-60px">
																	<img src="assets/images/courses/4by3/08.jpg" class="rounded" alt="">
																</div>
																<!-- Title -->
																<h6 class="mb-0 ms-2">
																	<a href="#">Building Scalable APIs with GraphQL</a>
																</h6>
															</div>
														</td>
														<!-- Selling item -->
														<td>34</td>
														<!-- Amount item -->
														<td>$1,25,478</td>
														<!-- Action item -->
														<td>
															<a href="#" class="btn btn-sm btn-success-soft btn-round me-1 mb-0"><i class="far fa-fw fa-edit"></i></a>
															<button class="btn btn-sm btn-danger-soft btn-round mb-0"><i class="fas fa-fw fa-times"></i></button>
														</td>
													</tr>
												</tbody>
												<!-- Table body END -->
											</table>
											<!-- Table END -->
										</div>

										<!-- Pagination -->
										<div class="d-sm-flex justify-content-sm-between align-items-sm-center mt-3">
											<!-- Content -->
											<p class="mb-0 text-center text-sm-start">Showing 1 to 8 of 20 entries</p>
											<!-- Pagination -->
											<nav class="d-flex justify-content-center mb-0" aria-label="navigation">
												<ul class="pagination pagination-sm pagination-primary-soft mb-0 pb-0">
													<li class="page-item mb-0"><a class="page-link" href="#" tabindex="-1"><i class="fas fa-angle-left"></i></a></li>
													<li class="page-item mb-0"><a class="page-link" href="#">1</a></li>
													<li class="page-item mb-0 active"><a class="page-link" href="#">2</a></li>
													<li class="page-item mb-0"><a class="page-link" href="#">3</a></li>
													<li class="page-item mb-0"><a class="page-link" href="#"><i class="fas fa-angle-right"></i></a></li>
												</ul>
											</nav>
										</div>
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
	<script src="vendor/js/display_page.js"></script>
	
	<script>
		function showAlert() {
			alert("<?php echo 'you will signout?'; ?>");
		}
	</script>


</body>

</html>