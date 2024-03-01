<head>
	<title>Eduport - LMS, Education and Course Theme</title>

	<!-- Meta Tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="Webestica.com">
	<meta name="description" content="Eduport- LMS, Education and Course Theme">

	<!-- Dark mode -->
	<script>
		const storedTheme = localStorage.getItem('theme')
 
		const getPreferredTheme = () => {
			if (storedTheme) {
				return storedTheme
			}
			return window.matchMedia('(prefers-color-scheme: light)').matches ? 'light' : 'light'
		}

		const setTheme = function (theme) {
			if (theme === 'auto' && window.matchMedia('(prefers-color-scheme: dark)').matches) {
				document.documentElement.setAttribute('data-bs-theme', 'dark')
			} else {
				document.documentElement.setAttribute('data-bs-theme', theme)
			}
		}

		setTheme(getPreferredTheme())

		window.addEventListener('DOMContentLoaded', () => {
		    var el = document.querySelector('.theme-icon-active');
			if(el != 'undefined' && el != null) {
				const showActiveTheme = theme => {
				const activeThemeIcon = document.querySelector('.theme-icon-active use')
				const btnToActive = document.querySelector(`[data-bs-theme-value="${theme}"]`)
				const svgOfActiveBtn = btnToActive.querySelector('.mode-switch use').getAttribute('href')

				document.querySelectorAll('[data-bs-theme-value]').forEach(element => {
					element.classList.remove('active')
				})

				btnToActive.classList.add('active')
				activeThemeIcon.setAttribute('href', svgOfActiveBtn)
			}

			window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
				if (storedTheme !== 'light' || storedTheme !== 'dark') {
					setTheme(getPreferredTheme())
				}
			})

			showActiveTheme(getPreferredTheme())

			document.querySelectorAll('[data-bs-theme-value]')
				.forEach(toggle => {
					toggle.addEventListener('click', () => {
						const theme = toggle.getAttribute('data-bs-theme-value')
						localStorage.setItem('theme', theme)
						setTheme(theme)
						showActiveTheme(theme)
					})
				})

			}
		})
		
	</script>

	<!-- Favicon -->
	<link rel="shortcut icon" href="assets/images/favicon.ico">

	<!-- Google Font -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;700&amp;family=Roboto:wght@400;500;700&amp;display=swap">

	<!-- Plugins CSS -->
	<link rel="stylesheet" type="text/css" href="assets/vendor/font-awesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="assets/vendor/bootstrap-icons/bootstrap-icons.css">
	<link rel="stylesheet" type="text/css" href="assets/vendor/choices/css/choices.min.css">

	<!-- Theme CSS -->
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">

</head>

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

        <!-- Nav Main menu START -->
				<ul class="navbar-nav navbar-nav-scroll mx-auto">
				<!-- Nav Search END -->
			</div>
			<!-- Main navbar END -->

			<!-- Profile START -->
			<div class="dropdown ms-1 ms-lg-0">
				<a class="avatar avatar-sm p-0" href="#" id="profileDropdown" role="button" data-bs-auto-close="outside" data-bs-display="static" data-bs-toggle="dropdown" aria-expanded="false">
					<img class="avatar-img rounded-circle" src="assets/images/avatar/01.jpg" alt="avatar">
				</a>
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
					<li><a class="dropdown-item" href="#"><i class="bi bi-person fa-fw me-2"></i>Edit Profile</a></li>
					<li><a class="dropdown-item" href="#"><i class="bi bi-gear fa-fw me-2"></i>Account Settings</a></li>
					<li><a class="dropdown-item" href="#"><i class="bi bi-info-circle fa-fw me-2"></i>Help</a></li>
					<li><a class="dropdown-item bg-danger-soft-hover" href="#"><i class="bi bi-power fa-fw me-2"></i>Sign Out</a></li>
					<li> <hr class="dropdown-divider"></li>
					<!-- Dark mode options START -->
					<li>
						<div class="bg-light dark-mode-switch theme-icon-active d-flex align-items-center p-1 rounded mt-2">
							<button type="button" class="btn btn-sm mb-0 active" data-bs-theme-value="light">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sun fa-fw mode-switch" viewBox="0 0 16 16">
									<path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"></path>
									<use href="#"></use>
								</svg> Light
							</button>
							<button type="button" class="btn btn-sm mb-0" data-bs-theme-value="dark">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-moon-stars fa-fw mode-switch" viewBox="0 0 16 16">
									<path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278zM4.858 1.311A7.269 7.269 0 0 0 1.025 7.71c0 4.02 3.279 7.276 7.319 7.276a7.316 7.316 0 0 0 5.205-2.162c-.337.042-.68.063-1.029.063-4.61 0-8.343-3.714-8.343-8.29 0-1.167.242-2.278.681-3.286z"></path>
									<path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z"></path>
									<use href="#"></use>
								</svg> Dark
							</button>
							<button type="button" class="btn btn-sm mb-0" data-bs-theme-value="auto">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-circle-half fa-fw mode-switch" viewBox="0 0 16 16">
									<path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z"></path>
									<use href="#"></use>
								</svg> Auto
							</button>
						</div>
					</li> 
					<!-- Dark mode options END-->
				</ul>
			</div>
			<!-- Profile START -->
		</div>
	</nav>
	<!-- Logo Nav END -->
</header><div id="sticky-space" style="height: 0px;"></div>
<!-- Header END -->

<!-- **************** MAIN CONTENT START **************** -->
<main>

<!-- =======================
Page Banner START -->
<section class="bg-dark align-items-center d-flex" style="background:url(assets/images/pattern/04.png) no-repeat center center; background-size:cover;">
	<!-- Main banner background image -->
	<div class="container">
			<div class="row">
				<div class="col-12">
					<!-- Title -->
					<h1 class="text-white">Course List Minimal</h1>
					<!-- Breadcrumb -->
					<div class="d-flex">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb breadcrumb-dark breadcrumb-dots mb-0">
								<li class="breadcrumb-item"><a href="#">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Courses</li>
							</ol>
						</nav>
					</div>
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

			<!-- Select option -->
			<div class="col-sm-6 col-xl-3 mt-3 mt-lg-0">
				<form class="border rounded p-2 input-borderless">
                <select class="form-select" aria-label="Default select example">
                <option selected>Category</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
                </select>
				</form>
			</div>

			<!-- Select option -->
			<div class="col-sm-6 col-xl-3 mt-3 mt-xl-0">
				<form class="border rounded p-2 input-borderless">
                <select class="form-select" aria-label="Default select example">
                <option selected>short by</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
                </select>
				</form>
			</div>

			<!-- Button -->
			<div class="col-sm-6 col-xl-2 mt-3 mt-xl-0 d-grid">
				<a href="#" class="btn btn-lg btn-primary mb-0">Filter Results</a>
			</div>
		</div>
		<!-- Search option END -->

		<!-- Course list START -->
		<div class="row g-4 justify-content-center">

			<!-- Card item START -->
			<div class="col-lg-10 col-xxl-6">
				<div class="card rounded overflow-hidden shadow">
					<div class="row g-0">
						<!-- Image -->
						<div class="col-md-4">
							<img src="assets/images/courses/4by3/01.jpg" alt="card image">
						</div>

						<!-- Card body -->
						<div class="col-md-8">
							<div class="card-body">
								<!-- Title -->
								<div class="d-flex justify-content-between mb-2">
									<h5 class="card-title mb-0"><a href="#">The Complete Digital Marketing Course - 12 Courses in 1</a></h5>
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
			<!-- Card item END -->

			<!-- Card item START -->
			<div class="col-lg-10 col-xxl-6">
				<div class="card rounded overflow-hidden shadow">
					<div class="row g-0">
						<!-- Image -->
						<div class="col-md-4">
							<img src="assets/images/courses/4by3/02.jpg" alt="card image">
						</div>

						<!-- Card body -->
						<div class="col-md-8">
							<div class="card-body">
								<!-- Title -->
								<div class="d-flex justify-content-between mb-2">
									<h5 class="card-title mb-0"><a href="#">Graphic Design Masterclass</a></h5>
									<!-- Wishlist icon -->
									<a href="#" class="h6 fw-light"><i class="far fa-heart"></i></a>
								</div>
								<!-- Content -->
								<!-- Info -->
								<ul class="list-inline mb-1">
									<li class="list-inline-item h6 fw-light mb-1 mb-sm-0"><i class="far fa-clock text-danger me-2"></i>9h 56m</li>
									<li class="list-inline-item h6 fw-light mb-1 mb-sm-0"><i class="fas fa-table text-orange me-2"></i>65 lectures</li>
									<li class="list-inline-item h6 fw-light"><i class="fas fa-signal text-success me-2"></i>All level</li>
								</ul>
								<!-- Rating -->
								<ul class="list-inline mb-0">
									<li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
									<li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
									<li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
									<li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
									<li class="list-inline-item me-0 small"><i class="far fa-star text-warning"></i></li>
									<li class="list-inline-item ms-2 h6 fw-light">4.0/5.0</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Card item END -->

			<!-- Card item START -->
			<div class="col-lg-10 col-xxl-6">
				<div class="card rounded overflow-hidden shadow">
					<div class="row g-0">
						<!-- Image -->
						<div class="col-md-4">
							<img src="assets/images/courses/4by3/03.jpg" alt="card image">
						</div>

						<!-- Card body -->
						<div class="col-md-8">
							<div class="card-body">
								<!-- Title -->
								<div class="d-flex justify-content-between mb-2">
									<h5 class="card-title mb-0"><a href="#">Create a Design System in Figma</a></h5>
									<!-- Wishlist icon -->
									<a href="#" class="h6 fw-light"><i class="far fa-heart"></i></a>
								</div>
								<!-- Content -->
								<!-- Info -->
								<ul class="list-inline mb-1">
									<li class="list-inline-item h6 fw-light mb-1 mb-sm-0"><i class="far fa-clock text-danger me-2"></i>7h 16m</li>
									<li class="list-inline-item h6 fw-light mb-1 mb-sm-0"><i class="fas fa-table text-orange me-2"></i>32 lectures</li>
									<li class="list-inline-item h6 fw-light"><i class="fas fa-signal text-success me-2"></i>Intermediate</li>
								</ul>
								<!-- Rating -->
								<ul class="list-inline mb-0">
									<li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
									<li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
									<li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
									<li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
									<li class="list-inline-item me-0 small"><i class="far fa-star text-warning"></i></li>
									<li class="list-inline-item ms-2 h6 fw-light">4.0/5.0</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Card item END -->

			<!-- Card item START -->
			<div class="col-lg-10 col-xxl-6">
				<div class="card rounded overflow-hidden shadow">
					<div class="row g-0">
						<!-- Image -->
						<div class="col-md-4">
							<img src="assets/images/courses/4by3/05.jpg" alt="card image">
						</div>

						<!-- Card body -->
						<div class="col-md-8">
							<div class="card-body">
								<!-- Title -->
								<div class="d-flex justify-content-between mb-2">
									<h5 class="card-title mb-0"><a href="#">The Complete Web Development in python</a></h5>
									<!-- Wishlist icon -->
									<a href="#"><i class="fas fa-heart text-danger"></i></a>
								</div>
								<!-- Content -->
								<!-- Info -->
								<ul class="list-inline mb-1">
									<li class="list-inline-item h6 fw-light mb-1 mb-sm-0"><i class="far fa-clock text-danger me-2"></i>7h 16m</li>
									<li class="list-inline-item h6 fw-light mb-1 mb-sm-0"><i class="fas fa-table text-orange me-2"></i>32 lectures</li>
									<li class="list-inline-item h6 fw-light"><i class="fas fa-signal text-success me-2"></i>Intermediate</li>
								</ul>
								<!-- Rating -->
								<ul class="list-inline mb-0">
									<li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
									<li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
									<li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
									<li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
									<li class="list-inline-item me-0 small"><i class="far fa-star text-warning"></i></li>
									<li class="list-inline-item ms-2 h6 fw-light">4.0/5.0</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Card item END -->

			<!-- Card item START -->
			<div class="col-lg-10 col-xxl-6">
				<div class="card rounded overflow-hidden shadow">
					<div class="row g-0">
						<!-- Image -->
						<div class="col-md-4">
							<img src="assets/images/courses/4by3/06.jpg" alt="card image">
						</div>

						<!-- Card body -->
						<div class="col-md-8">
							<div class="card-body">
								<!-- Title -->
								<div class="d-flex justify-content-between mb-2">
									<h5 class="card-title mb-0"><a href="#">Angular – The Complete Guider</a></h5>
									<!-- Wishlist icon -->
									<a href="#" class="h6 fw-light"><i class="far fa-heart"></i></a>
								</div>
								<!-- Content -->
								<!-- Info -->
								<ul class="list-inline mb-1">
									<li class="list-inline-item h6 fw-light mb-1 mb-sm-0"><i class="far fa-clock text-danger me-2"></i>21h 16m</li>
									<li class="list-inline-item h6 fw-light mb-1 mb-sm-0"><i class="fas fa-table text-orange me-2"></i>68 lectures</li>
									<li class="list-inline-item h6 fw-light"><i class="fas fa-signal text-success me-2"></i>All level</li>
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
			<!-- Card item END -->

			<!-- Card item START -->
			<div class="col-lg-10 col-xxl-6">
				<div class="card rounded overflow-hidden shadow">
					<div class="row g-0">
						<!-- Image -->
						<div class="col-md-4">
							<img src="assets/images/courses/4by3/07.jpg" alt="card image">
						</div>

						<!-- Card body -->
						<div class="col-md-8">
							<div class="card-body">
								<!-- Title -->
								<div class="d-flex justify-content-between mb-2">
									<h5 class="card-title mb-0"><a href="#">Deep Learning with React-Native</a></h5>
									<!-- Wishlist icon -->
									<a href="#" class="h6 fw-light"><i class="far fa-heart"></i></a>
								</div>
								<!-- Content -->
								<!-- Info -->
								<ul class="list-inline mb-1">
									<li class="list-inline-item h6 fw-light mb-1 mb-sm-0"><i class="far fa-clock text-danger me-2"></i>10h 16m</li>
									<li class="list-inline-item h6 fw-light mb-1 mb-sm-0"><i class="fas fa-table text-orange me-2"></i>21 lectures</li>
									<li class="list-inline-item h6 fw-light"><i class="fas fa-signal text-success me-2"></i>Advance</li>
								</ul>
								<!-- Rating -->
								<ul class="list-inline mb-0">
									<li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
									<li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
									<li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
									<li class="list-inline-item me-0 small"><i class="fas fa-star-half-alt text-warning"></i></li>
									<li class="list-inline-item me-0 small"><i class="far fa-star text-warning"></i></li>
									<li class="list-inline-item ms-2 h6 fw-light">3.5/5.0</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Card item END -->

			<!-- Card item START -->
			<div class="col-lg-10 col-xxl-6">
				<div class="card rounded overflow-hidden shadow">
					<div class="row g-0">
						<!-- Image -->
						<div class="col-md-4">
							<img src="assets/images/courses/4by3/09.jpg" alt="card image">
						</div>

						<!-- Card body -->
						<div class="col-md-8">
							<div class="card-body">
								<!-- Title -->
								<div class="d-flex justify-content-between mb-2">
									<h5 class="card-title mb-0"><a href="#">JavaScript: Full Understanding</a></h5>
									<!-- Wishlist icon -->
									<a href="#"><i class="fas fa-heart text-danger"></i></a>
								</div>
								<!-- Content -->
								<!-- Info -->
								<ul class="list-inline mb-1">
									<li class="list-inline-item h6 fw-light mb-1 mb-sm-0"><i class="far fa-clock text-danger me-2"></i>7h 16m</li>
									<li class="list-inline-item h6 fw-light mb-1 mb-sm-0"><i class="fas fa-table text-orange me-2"></i>12 lectures</li>
									<li class="list-inline-item h6 fw-light"><i class="fas fa-signal text-success me-2"></i>Beginner</li>
								</ul>
								<!-- Rating -->
								<ul class="list-inline mb-0">
									<li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
									<li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
									<li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
									<li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
									<li class="list-inline-item me-0 small"><i class="far fa-star text-warning"></i></li>
									<li class="list-inline-item ms-2 h6 fw-light">4.0/5.0</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Card item END -->

			<!-- Card item START -->
			<div class="col-lg-10 col-xxl-6">
				<div class="card rounded overflow-hidden shadow">
					<div class="row g-0">
						<!-- Image -->
						<div class="col-md-4">
							<img src="assets/images/courses/4by3/11.jpg" alt="card image">
						</div>

						<!-- Card body -->
						<div class="col-md-8">
							<div class="card-body">
								<!-- Title -->
								<div class="d-flex justify-content-between mb-2">
									<h5 class="card-title mb-0"><a href="#">Build Responsive Websites with HTML</a></h5>
									<!-- Wishlist icon -->
									<a href="#" class="h6 fw-light"><i class="far fa-heart"></i></a>
								</div>
								<!-- Content -->
								<!-- Info -->
								<ul class="list-inline mb-1">
									<li class="list-inline-item h6 fw-light mb-1 mb-sm-0"><i class="far fa-clock text-danger me-2"></i>15h 16m</li>
									<li class="list-inline-item h6 fw-light mb-1 mb-sm-0"><i class="fas fa-table text-orange me-2"></i>38 lectures</li>
									<li class="list-inline-item h6 fw-light"><i class="fas fa-signal text-success me-2"></i>All level</li>
								</ul>
								<!-- Rating -->
								<ul class="list-inline mb-0">
									<li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
									<li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
									<li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
									<li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
									<li class="list-inline-item me-0 small"><i class="far fa-star text-warning"></i></li>
									<li class="list-inline-item ms-2 h6 fw-light">4.0/5.0</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Card item END -->

			<!-- Card item START -->
			<div class="col-lg-10 col-xxl-6">
				<div class="card rounded overflow-hidden shadow">
					<div class="row g-0">
						<!-- Image -->
						<div class="col-md-4">
							<img src="assets/images/courses/4by3/12.jpg" alt="card image">
						</div>

						<!-- Card body -->
						<div class="col-md-8">
							<div class="card-body">
								<!-- Title -->
								<div class="d-flex justify-content-between mb-2">
									<h5 class="card-title mb-0"><a href="#">Build Websites with CSS</a></h5>
									<!-- Wishlist icon -->
									<a href="#" class="h6 fw-light"><i class="far fa-heart"></i></a>
								</div>
								<!-- Content -->
								<!-- Info -->
								<ul class="list-inline mb-1">
									<li class="list-inline-item h6 fw-light mb-1 mb-sm-0"><i class="far fa-clock text-danger me-2"></i>22h 16m</li>
									<li class="list-inline-item h6 fw-light mb-1 mb-sm-0"><i class="fas fa-table text-orange me-2"></i>16 lectures</li>
									<li class="list-inline-item h6 fw-light"><i class="fas fa-signal text-success me-2"></i>Advance</li>
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
			<!-- Card item END -->

			<!-- Card item START -->
			<div class="col-lg-10 col-xxl-6">
				<div class="card rounded overflow-hidden shadow">
					<div class="row g-0">
						<!-- Image -->
						<div class="col-md-4">
							<img src="assets/images/courses/4by3/13.jpg" alt="card image">
						</div>

						<!-- Card body -->
						<div class="col-md-8">
							<div class="card-body">
								<!-- Title -->
								<div class="d-flex justify-content-between mb-2">
									<h5 class="card-title mb-0"><a href="#">PHP with - CMS Project</a></h5>
									<!-- Wishlist icon -->
									<a href="#"><i class="fas fa-heart text-danger"></i></a>
								</div>
								<!-- Content -->
								<!-- Info -->
								<ul class="list-inline mb-1">
									<li class="list-inline-item h6 fw-light mb-1 mb-sm-0"><i class="far fa-clock text-danger me-2"></i>10h 16m</li>
									<li class="list-inline-item h6 fw-light mb-1 mb-sm-0"><i class="fas fa-table text-orange me-2"></i>9 lectures</li>
									<li class="list-inline-item h6 fw-light"><i class="fas fa-signal text-success me-2"></i>Intermediate</li>
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
			<!-- Card item END -->
		</div>
		<!-- Course list END -->

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


</body>