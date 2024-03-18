<body>
<!-- **************** MAIN CONTENT START **************** -->
<main>
<!-- =======================
Page Banner END -->

<!-- =======================
Newsletter START -->
<section class="pt-0">
	
		
		
<!-- =======================
Page Banner START -->
<section class="py-4" >
	<div class="container" style="margin-top: 100px;">
		<div class="row">
			<div class="col-12">
				<div class="bg-light p-4 text-center">
					<h1 class="m-0">Courses' lessons...</h1>
					<!-- Breadcrumb -->
					<div class="d-flex justify-content-center">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb breadcrumb-dots mb-0">
								<li class="breadcrumb-item"><a href="#">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Course minimal</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<!-- =======================
Newsletter END -->
<div class="container d-flex alin-item-center gap-4 flex-wrap" >
<?php
$unite = 0;
$lessons=$_SESSION['myLesson'];
if(empty($lessons)){
	echo "<h1>This page will have lesson Soon....</h1>";
}else{
	
foreach($lessons as $lesson):

?>
<div class="col-sm-6 col-lg-4 col-xl-3">
                                <div class="card shadow h-100">
                                    <!-- Image -->
                                    <iframe class="card-img-top" width="400" height="315" src="https://www.youtube.com/embed/cnXImeAq2f8?si=Rps6sPsulteyVBIC" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                    
                                    <!-- Card body -->
                                    <div class="card-body pb-0">
                                        <!-- Title -->
                                        <h5 class="card-title"><?= $lesson['lesson_title'] ?><a href="#"></a></h5>
                                      
                                    </div>
                                    <!-- Card footer -->
                                    <div class="card-footer pt-0 pb-3">
                                        <hr>
                                        <div class="d-flex justify-content-between">
                                            <span class="h6 fw-light mb-0"><i class="fas fa-table text-orange me-2"></i></span>
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
Footer START -->


<!-- Back to top -->
<div class="back-top"><i class="bi bi-arrow-up-short position-absolute top-50 start-50 translate-middle"></i></div>

<!-- Bootstrap JS -->
<script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<!-- Vendors -->
<script src="assets/vendor/choices/js/choices.min.js"></script>

<!-- Template Functions -->
<script src="assets/js/functions.js"></script>


</body>