<main>

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
											<form class="row g-3">
				
												<!-- Card number -->
												<div class="col-12">
													<label class="form-label">Card Number <span class="text-danger">*</span></label>
													<div class="position-relative">
														<input type="text" class="form-control" placeholder="xxxx xxxx xxxx xxxx">
														<img src="assets/images/client/visa.svg" class="w-40px position-absolute top-50 end-0 translate-middle-y me-2 d-none d-sm-block" alt="">
													</div>	
												</div>
												<!-- Expiration Date -->
												<div class="col-md-6">
													<label class="form-label">Expiration date <span class="text-danger">*</span></label>
													<div class="input-group">
														<input type="text" class="form-control" maxlength="2" placeholder="Month">
														<input type="text" class="form-control" maxlength="4" placeholder="Year">
													</div>
												</div>	
												<!--Cvv code  -->
												<div class="col-md-6">
													<label class="form-label">CVV / CVC <span class="text-danger">*</span></label>
													<input type="text" class="form-control" maxlength="3" placeholder="xxx">
												</div>
												<!-- Card name -->
												<div class="col-12">
													<label class="form-label">Name on Card <span class="text-danger">*</span></label>
													<input type="text" class="form-control" aria-label="name of card holder" placeholder="Enter card holder name">
												</div>
												<div class="col-12 text-end">
												<button type="submit" class="btn btn-primary mb-0" disabled="">Save changes</button>
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
									<img  src="assets/images/courses/4by3/08.jpg" alt="" width="600px">
								</div>
								<!-- Info -->
								<div class="col-sm-8">
									<h6 class="mb-0"><a href="#">Sketch from A to Z: for an app designer</a></h6>
									<!-- Info -->
									<div class="d-flex justify-content-between align-items-center mt-3">
										<!-- Price -->
										<span class="text-success">$150</span>

										<!-- Remove and edit button -->
										<div class="text-primary-hover">
											<a href="#" class="text-body me-2"><i class="bi bi-trash me-1"></i>Remove</a>
											<a href="#" class="text-body me-2"><i class="bi bi-pencil-square me-1"></i>Edit</a>
										</div>
									</div>
								</div>
							</div>
							<!-- Course item END -->
							
							<hr> <!-- Divider -->

							
							<!-- Course item END -->

							<hr> <!-- Divider -->

							
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