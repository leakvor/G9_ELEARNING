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
		<div class="row g-4 justify-content-center">
		<?php
if (empty($displayCourses)) {
    // Display message when $displayCourses is empty
    echo "<h1>This page will have Courses Soon....</h1>";
} else {
    foreach($displayCourses as $displayCourse):
?>
        <!-- Card item START -->
        <div class="col-lg-10 col-xxl-6">
            <div class="card rounded overflow-hidden shadow">
                <div class="row g-0">
                    <!-- Image -->
                    <div class="col-md-4">
                        <img src="assets/images/course/<?=$displayCourse['course_img']?>" alt="card image">
                    </div>

                    <!-- Card body -->
                    <div class="col-md-8">
                        <div class="card-body">
                            <!-- Title -->
                            <div class="d-flex justify-content-between mb-2">
                                <h5 class="card-title mb-0"><a href="#"><?=$displayCourse['title']?></a></h5>
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
<section class="pt-0">
	<div class="container position-relative">
		<!-- SVG -->
		<figure class="position-absolute top-50 start-50 translate-middle ms-3">
			<svg>
				<path d="m496 22.999c0 10.493-8.506 18.999-18.999 18.999s-19-8.506-19-18.999 8.507-18.999 19-18.999 18.999 8.506 18.999 18.999z" fill="#fff" fill-rule="evenodd" opacity=".502"></path>
				<path d="m775 102.5c0 5.799-4.701 10.5-10.5 10.5-5.798 0-10.499-4.701-10.499-10.5 0-5.798 4.701-10.499 10.499-10.499 5.799 0 10.5 4.701 10.5 10.499z" fill="#fff" fill-rule="evenodd" opacity=".102"></path>
				<path d="m192 102c0 6.626-5.373 11.999-12 11.999s-11.999-5.373-11.999-11.999c0-6.628 5.372-12 11.999-12s12 5.372 12 12z" fill="#fff" fill-rule="evenodd" opacity=".2"></path>
				<path d="m20.499 10.25c0 5.66-4.589 10.249-10.25 10.249-5.66 0-10.249-4.589-10.249-10.249-0-5.661 4.589-10.25 10.249-10.25 5.661-0 10.25 4.589 10.25 10.25z" fill="#fff" fill-rule="evenodd" opacity=".2"></path>
			</svg>
		</figure>
		
		<div class="bg-success p-4 p-sm-5 rounded-3">
			<div class="row justify-content-center position-relative">
				<!-- Svg -->
				<figure class="fill-white opacity-1 position-absolute top-50 start-0 translate-middle-y">
					<svg width="141px" height="141px">
						<path d="M140.520,70.258 C140.520,109.064 109.062,140.519 70.258,140.519 C31.454,140.519 -0.004,109.064 -0.004,70.258 C-0.004,31.455 31.454,-0.003 70.258,-0.003 C109.062,-0.003 140.520,31.455 140.520,70.258 Z"></path>
					</svg>
				</figure>
				<!-- Action box -->
				<div class="col-11 position-relative">
					<div class="row align-items-center">
						<!-- Title -->
						<div class="col-lg-7">
							<h3 class="text-white">Become an Instructor!</h3>
							<p class="text-white mb-3 mb-lg-0">Speedily say has suitable disposal add boy. On forth doubt miles of child. Exercise joy man children rejoiced. Yet uncommonly his ten who diminution astonished.</p>
						</div>
						<!-- Button -->
						<div class="col-lg-5 text-lg-end">
							<a href="#" class="btn btn-dark mb-0">Start Teaching today</a>
						</div>
					</div>
				</div>
			</div> <!-- Row END -->
		</div>
	</div>
</section>
<!-- =======================
Action box END -->

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
