<body>
	<?php
	// session_start()
	?>
	<!-- Header START -->
	<header class="navbar-light navbar-sticky">
		<!-- Bootstrap CSS -->
		<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
				<button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse"
					data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
					aria-label="Toggle navigation">
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
					<ul class="dropdown-menu dropdown-animation dropdown-menu-end shadow pt-3"
						aria-labelledby="profileDropdown">
						<!-- Profile info -->
						<li class="px-3">
							<div class="d-flex align-items-center">
								<!-- Avatar -->
								<div class="avatar me-3">
									<img class="avatar-img rounded-circle shadow" src="assets/images/avatar/01.jpg"
										alt="avatar">
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
						<li><a class="dropdown-item bg-danger-soft-hover" href="#"><i
									class="bi bi-power fa-fw me-2"></i>Sign Out</a></li>
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
	<?php
	require "models/course.model.php";
	if (isset($_SESSION['user'])) {
		$student_id = ($_SESSION['user']['user_id']);
		date_default_timezone_set('Asia/Phnom_Penh');
		$date_join = date("Y-m-d H:i:s");;
	}
	if (isset($_SESSION['pay_id'])) {
		$cours_id = $_SESSION['pay_id'];
		// var_dump($cours_id);
		$course = eachCourse($cours_id);
		
		if ($course[0]['paid'] != 0) {
			$to_pay = 'PAY ' . $course[0]['paid'] . '$';
			$pay_btn = 'Pay course';
			$path = "../../controllers/students/payMoney.controller.php?id=$cours_id";
		} else {
			$to_pay = 'Free course';
			$pay_btn = 'Learn free';
			$path = '/stu_lesson';
		}
	}

	?>

	<main>
		<div class="container">
			<div class="row justify-content-center bg-blue p-4">
				<div class="col-md-6">
					<h2 class="text-center mb-4 text-white">Course Payment</h2>
					<div class="card mb-4">
						<div class="card-body">
							<div class="two_style" style="display: flex;justify-content: space-between;">
							<h5 class="card-title">Select Amount to Pay</h5>
							<form action="../../controllers/mychart/chartId.controller.php" method="post">
									<input type="hidden" name="course_id" value="<?= $_SESSION['pay_id'] ?>">
									<input type="hidden" name="user_id" value="<?= $_SESSION['user']['user_id'] ?>">
									<input type="hidden" name="datejoin" value="<?= $date_join ?>">
									<button type="submit" class="btn-danger" style="margin-left:30px;">Add to chart</button>
								</form>
							</div>
							<div class="btn-group" style="height: 150px; width:100%" role="group"
								aria-label="Basic outlined example">
								<button type="checkbox" class="btn btn-outline-primary bg-dark fs-2" name="name"
									value="qwqwq" style="height: 150px; width:100%">
									<?= $to_pay ?>
								</button>
							</div>
							<button class="btn dropdown-toggle btn-lg btn-block mt-2 dropbtn" type="button"
								id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
								aria-expanded="false">Show plan</button>
							<div class="dropInfor" style="display:none">
								<li>Confirmation Message Upon Successful Submission</li>
								<li>Information on Next Steps</li>
							</div>
							<form action="<?=$path?>" id="paymentForm" method="post">
								<input type="hidden" name="course_id" value="<?= $cours_id ?>">
								<input type="hidden" name="user_id" value="<?= $student_id ?>">
								<input type="hidden" name="datejoin" value="<?= $date_join ?>">
								<div class="form-group">
									<a href="" ></a>
									<button type="submit" class="btn-primary btn-custom btn-lg mt-2" style="width: 100%;"><?= $pay_btn ?></button>
						</div>
					</div>
				</div>
			</div>
	</main>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

	<script>
		let dropbtn = document.querySelector('.dropbtn')
		let dropInfor = document.querySelector('.dropInfor')
		let payed = document.querySelector('.payed')

		dropbtn.addEventListener('click', () => {
			if (dropInfor.style.display == "none") {
				dropInfor.style.display = "block"
			} else {
				dropInfor.style.display = "none"
			}
		})
	</script>
</body>

</html>