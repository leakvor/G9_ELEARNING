<main>
<?php 
// session_start();
require "database/database.php";
require "models/​student_course.model.php";

$id=$_SESSION['pay_id'];
$course=showCourse($id);
date_default_timezone_set('Asia/Phnom_Penh');
$date_join = date("Y-m-d H:i:s");
// require "controllers/payCourse/paymentCourse.controller.php";
?>
<?php


$cardNameMsg = isset($_SESSION['cardName']) ? $_SESSION['cardName'] : '';
$cardNumberMsg = $_SESSION['cardNumber'] ?? '';
$cvvMsg = $_SESSION['cardCvv'] ?? '';
 ?>
<!-- =======================
Page Banner START -->
<section class="pt-50">
	<div class="container">
		<div class="row card card-body ">
			<div class="col-12">
				<div class="p-6 text-center rounded-3">
					<h1 class="m-0">Checkout</h1>
					<!-- Breadcrumb -->
					<div class="d-flex justify-content-center">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb breadcrumb-dots mb-0">
								<li class="breadcrumb-item"><a href="#">Home</a></li>
								<li class="breadcrumb-item"><a href="#">Courses</a></li>
								<li class="breadcrumb-item"><a href="#">Cart</a></li>
								<li class="breadcrumb-item active" aria-current="page">Checkout</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- =======================
Page Banner END -->

<!-- =======================
Page content START -->
<section class="pt-1">
	<div class="container">
		<div class="row g-4 g-sm-5">
			<!-- Main content START -->
			<div class="col-xl-8 mb-4 mb-sm-0">
				

				<!-- Personal info START -->
				<div class="card card-body shadow p-4">
					<!-- Form END -->
					<!-- Payment method START -->
					<div class="row g-3 mt-4">
						<!-- Title -->
						<h5 class="">Payment</h5>
						<div class="col-12">
							<div class="accordion accordion-circle" id="accordioncircle">
								<!-- Credit or debit card START -->
								<div class="accordion-item mb-3">
									<h6 class="accordion-header" id="heading-1">
										<button class="accordion-button rounded collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-1" aria-expanded="true" aria-controls="collapse-1">
											Credit or Debit Card 
										</button>
									</h6>
									<div id="collapse-1" class="accordion-collapse collapse show" aria-labelledby="heading-1" data-bs-parent="#accordioncircle">
										<!-- Accordion body -->
										<div class="accordion-body">
											<!-- Form START -->
											<form class="row g-3" action="controllers/payCourse/paymentCourse.controller.php" method="post">
												<!-- Card number -->
												<div class="col-12">
													<input type="hidden" value="<?=$course['course_id']?>" name="course_id">
													<input type="hidden" value="<?=$course['paid']?>" name="paid">
													<input type="hidden" value="<?=$_SESSION['user']['user_id']?>" name="user_id">
													<input type="hidden" value="<?=$date_join?>" name="date">
													<label class="form-label">Card Number <span class="text-danger">*</span></label>
													<div class="position-relative">
														<input type="text" class="form-control" placeholder="xxxx xxxx xxxx xxxx" name="numberCard">
														<img src="assets/images/client/visa.svg" class="w-40px position-absolute top-50 end-0 translate-middle-y me-2 d-none d-sm-block" alt="">
													</div>	
													<p class="text-danger"><?= $cardNumberMsg ?></p>
												</div>
												<!--Cvv code  -->
												<div class="col-md-6">
													<label class="form-label">CVV / CVC <span class="text-danger">*</span></label>
													<input type="text" class="form-control" maxlength="3" placeholder="xxx" name="cvv">
													<p class="text-danger"><?= $cvvMsg ?></p>
												</div>
												<!-- Card name -->
												<div class="col-12">
													<label class="form-label">Name on Card <span class="text-danger">*</span></label>
													<input type="text" class="form-control" aria-label="name of card holder" placeholder="Enter card holder name" name="nameCard">
													<p class="text-danger"><?= $cardNameMsg ?></p>
												</div>
												<div class="col-12 text-end">
												<button type="submit" class="btn btn-primary mb-0" >Checkout</button>
												</div>
											</form>
											<!-- Form END -->
										</div>
									</div>
								</div>
								<!-- Credit or debit card END -->

								<!-- Net banking START -->
								<div class="accordion-item mb-3">
									<h6 class="accordion-header" id="heading-2">
										<button class="accordion-button collapsed rounded" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-2" aria-expanded="false" aria-controls="collapse-2">
											Pay with Net Banking
										</button>
									</h6>
									<div id="collapse-2" class="accordion-collapse collapse" aria-labelledby="heading-2" data-bs-parent="#accordioncircle">
										<!-- Accordion body -->
										<div class="accordion-body">
											<!-- Form START -->
											<form class="row text-start g-3">
												<p class="mb-1">In order to complete your transaction, we will transfer you over to Eduport secure servers.</p>
												<p class="my-0">Select your bank from the drop-down list and click proceed to continue with your payment.</p>
												<!-- Select bank -->
												<div class="col-md-6">
												<label for="mobileNumber" class="form-label">Please choose one *</label>
												<select class="form-select">
													<option>Please choose one</option>
													<option>Bank of America</option>
													<option>Bank of India</option>
													<option>Bank of London</option>
												</select>
												
													
												</div>
											</form>
											<!-- Form END -->
										</div>
									</div>
								</div>
								<!-- Net banking END -->
							</div>
						</div>
					</div>
					<!-- Payment method END -->
				</div>
				<!-- Personal info END -->
			</div>
			<!-- Main content END -->

			<!-- Right sidebar START -->
			<div class="col-xl-4">
				<div class="row mb-0">
					<div class="col-md-6 col-xl-12">
						<!-- Order summary START -->
						<div class="card card-body shadow p-4 mb-4">
							<!-- Title -->
							<h4 class="mb-4">Order Summary</h4>
							<hr>
							<!-- Coupon END -->
								
							<!-- Course item START -->
							<div class="row g-3">
								<!-- Image -->
								<div >
									<img  src="assets/images/course/<?=$course['course_img']?>" alt="" style="width: 100%; height: 250px; object-fit: cover;">
								</div>
								<!-- Info -->
								<div class="col-sm-8">
									<h6 class="mb-0"><a href="#"><?=$course['title']?></a></h6>
									<!-- Info -->
									<div class="d-flex justify-content-between align-items-center mt-3">
										<!-- Price -->
										<span class="text-success"><?=$course['paid']?>$</span>
									</div>
								</div>
							</div>												
						<!-- Order summary END -->
					</div>

					
				</div><!-- Row End -->
			</div>
			<!-- Right sidebar END -->

		</div><!-- Row END -->
	</div>
</section>
<!-- =======================
Page content END -->

</main>