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
							
					<!-- Nav item 3 Account -->
					<li class="nav-item dropdown">
						<!-- <a class="nav-link dropdown-toggle" href=""></a> -->
						<ul class="dropdown-menu" aria-labelledby="accounntMenu">
							<!-- Dropdown submenu -->

			</div>
			<!-- Main navbar END -->

			<!-- Profile START -->
			<div class="dropdown ms-1 ms-lg-0">
				<a class="avatar avatar-sm p-0" href="#" id="profileDropdown" role="button" data-bs-auto-close="outside" data-bs-display="static" data-bs-toggle="dropdown" aria-expanded="false">
					<img class="avatar-img rounded-circle" src="assets/images/avatar/01.jpg" alt="avatar">
				</a>
				<ul class="dropdown-menu dropdown-animation dropdown-menu-end shadow pt-3" aria-labelledby="profileDropdown">
					Profile info
					<li class="px-3 mb-3">
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
					</li>
          <li> <hr class="dropdown-divider"></li>
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
</header><div id="sticky-space" style="height: 0px;" class=""></div>
<!-- Header END -->

<!-- **************** MAIN CONTENT START **************** -->
<main>
	
<!-- =======================
Page Banner START -->
<section class="py-0 bg-blue h-100px align-items-center d-flex h-200px rounded-0" style="background:url(assets/images/pattern/04.png) no-repeat center center; background-size:cover;">
	<!-- Main banner background image -->
	<div class="container">
		<div class="row">
			<div class="col-12 text-center">
				<!-- Title -->
				<h1 class="text-white">Submit a new Lesson</h1>
				<p class="text-white mb-0">Read our <a href="#" class="text-white"><u>"Before you create a course"</u></a> article before submitting!</p>	
			</div>
		</div>
	</div>
</section>
<!-- =======================
Page Banner END -->

<!-- =======================
Steps START -->
<section>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $course_id = ($_POST['id']);}
?>
<!-- HTML code -->
<div class="container">
    <h3 class="form-group text-success">Create Lesson</h3>
    <form action="controllers/lesson/createlesson.controller.php" method="post"  enctype="multipart/form-data">
        <input type="hidden" value="<?= $course_id ?>" name="id">
        <div class="form-group">
            <label for="lessonName">Lesson Name</label>
            <input type="text" class="form-control mt-2 mb-2" name="lesson_title" id="lesson_title" placeholder="Enter lesson name" required>
        </div>
		<small class="text-danger" id="p"></small>


        <div class="form-group">
            <label for="video_url">Video URL:</label><br>
            <input type="text" class="form-control mt-2 mb-2" id="video_url" name="document" placeholder="Enter lesson URL" required>
        </div>
        <button type="submit" id="submitBtn" name="submit" value="Create Lesson" class="btn btn-primary mt-2" style="margin-top:10px">Submit</button>
    </form>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
    const lesson_titleInput = document.querySelector("#lesson_title");
    const submitBtn = document.querySelector("#submitBtn");
    const p = document.querySelector("#p");

    lesson_titleInput.addEventListener("input", () => {
        const text = lesson_titleInput.value.trim();
        checkInput(text);
    });
    function checkInput(text) {
        const regex = /^[a-zA-Z\s]{4,}$/;
        const isValid_lesson = regex.test(text);
        if (isValid_lesson) {
            p.textContent = "";
            submitBtn.removeAttribute("disabled");
        } else {
            p.textContent = "Please enter a valid title (at least 4 characters with letters and spaces only).";
            submitBtn.setAttribute("disabled", "true");
        }
    }
});
</script>
