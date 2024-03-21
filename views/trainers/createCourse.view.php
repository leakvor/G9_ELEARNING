<body>
	<!-- Header START -->
	<header class="navbar-light navbar-sticky">
		<!-- Logo Nav START -->
		<nav class="navbar navbar-expand-xl">
			<div class="container">
				<!-- Logo START -->
				<a class="navbar-brand" href="index.html">
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

				<?php
				$statement = $connection->prepare("select * from category");
				$statement->execute();
				$categories = $statement->fetchAll();

				?>
	</header>
	<div id="sticky-space" style="height: 0px;"></div>
	<!-- Header END -->
	<?php if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$id = ($_POST['id']);
	}
	?>
	<section class="py-0 bg-blue h-100px align-items-center d-flex h-200px rounded-0" style="background:url(assets/images/pattern/04.png) no-repeat center center; background-size:cover;">
		<!-- Main banner background image -->
		<div class="container">
			<div class="row">
				<div class="col-12 text-center">

					<!-- Title -->
					<h1 class="text-white">Submit a new Course</h1>
					<p class="text-white mb-0">Read our <a href="#" class="text-white"><u>"Before you create a course"</u></a> article before submitting!</p>
				</div>
			</div>
		</div>

	</section>
	<div class="col-md-7 mx-auto text-center mt-4">
		<!-- Content -->
		<p class="text-center">Use this interface to add a new Course to the portal. Once you are done adding the item it will be reviewed for quality. If approved, your course will appear for sale and you will be informed by email that your course has been accepted.</p>
	</div>
	<!-- Page Banner END -->
	<div class="container">
		<div class="modal-body">
			<form action="controllers/trainerCourse/createCourse.controller.php" method="POST" enctype="multipart/form-data">
				<h5>Course details</h5>
				<hr>
				<div class="form-group">
					<input type="hidden" value="<?= $id ?>" name="teacher">
					<label for="course-title">Course title</label>
					<input type="text" class="form-control" name="title" id="title" placeholder="Enter course title">
					<small class="text-danger" id="p"></small>
				</div>
				<div class="row d-flex justify-content-end mt-3">
					<div class="col-md-12 ">
						<label for="#">Course category</label>
						<select class="form-select" name='category'>
							<option selected value="#">Selete category</option>
							<?php foreach ($categories as $category) : ?>
								<option value="<?= $category['cat_id'] ?>"><?= $category['cateName'] ?></option>
							<?php endforeach ?>
						</select>
						<span id="categoryValidationMsg" class="text-danger"></span>
					</div>
				</div>
				<div class="col-md-12 mt-4 ">
					<label for="course-description">Course price</label>
					<input type="number" class="form-control" name="paid" id="course-price" placeholder="Enter course price" name='paid'>
				</div>
				<div class="text-center justify-content-center align-items-center p-4 p-sm-5 border border-2 border-dashed position-relative rounded-3 mt-4">
					<!-- Image -->
					<img src="" alt="">
					<div>
						<h6 class="my-2">Upload course image here, or<a href="#!" class="text-primary"> Browse</a></h6>
						<label style="cursor:pointer;">
							<span>
								<input class="form-control stretched-link" type="file" name="img" id="ima" accept="image/gif, image/jpeg, image/png">
							</span>
						</label>
					</div>
				</div>
				<div class="d-flex justify-content-end mt-3">
					<button type="submit" id="submitBtn" class="btn btn-primary next-btn mb-5" disabled>Create</button>
				</div>
			</form>
		</div>
	</div>
	<!--Footer START -->
	<footer class="bg-dark p-3">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-4 text-center text-md-start mb-3 mb-md-0">
					<!-- Logo START -->
					<a href="index.html"> <img class="h-20px" src="assets/images/logo-light.svg" alt="logo"> </a>
				</div>
				<div class="col-md-4">
					<!-- Rating -->
					<ul class="list-inline mb-0 text-center text-md-end">
						<li class="list-inline-item ms-2"><a href="#"><i class="text-white fab fa-facebook"></i></a></li>
						<li class="list-inline-item ms-2"><a href="#"><i class="text-white fab fa-instagram"></i></a></li>
						<li class="list-inline-item ms-2"><a href="#"><i class="text-white fab fa-linkedin-in"></i></a></li>
						<li class="list-inline-item ms-2"><a href="#"><i class="text-white fab fa-twitter"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</footer>
	<!-- Footer END -->
</body>