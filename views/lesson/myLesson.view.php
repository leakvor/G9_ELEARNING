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
			<section class="py-4">
				<div class="container" style="margin-top: 100px;">
					<div class="row">
						<div class="col-12">
							<div class="bg-light p-4 text-center">
								<h1 class="m-0">Courses' lessons...</h1>
								<?php
								require "database/database.php";
								require "models/comment.model.php";
								require "models/lesson.model.php";
								if (isset($_SESSION['id'])) {
									// var_dump($_SESSION['id']);
									$lessons = displayAlllesson($_SESSION['id']);
									$comments = displayAllcomment($_SESSION['id']);
									date_default_timezone_set('Asia/Phnom_Penh');
									$date_comment = date("Y-m-d H:i:s");
								}
								?>
								<!-- Breadcrumb -->
								<a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Comment</a>
								<div class="dropdown-menu dropdown-menu-end" data-bs-popper="none" style="width:100%;">
									<div class="row p-2">
										<div class="card shadow-0 border" style="width:95%; margin-left: 30px;">
											<div class="form-outline mb-4" style="width:100%; margin-top:20px;">
												<form action="controllers/comment/createcomment.controller.php" method="post">
													<input type="hidden" value="<?= $_SESSION['user']['user_id'] ?>" name="user_id">
													<input type="text" id="title" name="title" class="form-control" placeholder="Type comment...">
													<input type="hidden" id="title" name="course_id" value="<?= $_SESSION['id'] ?>">
													<input type="hidden" name="date" value="<?= $date_comment ?>">
													<button type="submit" style="margin:10px; padding:5px ;border:none;border-radius:5px">Submit</button>
												</form>
												<?php

												foreach ($comments as $comment) : ?>
													<div class="card mb-5">
														<div class="card-body​" style=" padding:15px;margin:10px ;background-color:#DCDCDC;">
															<p><?= $comment['title'] ?></p>
															<div class="d-flex justify-content-between">
																<div class="d-flex flex-row align-items-center">
																	<img src="assets/images/instructor/<?= $comment["img"] ?>" width="25" height="25">
																	<p class="small mb-0 ms-2"><?= $comment['username'] ?></p>
																</div>
																<div claass="d-flex flex-row align-items-center">
																	<p class="small mb-0"><?= $comment['date'] ?></p>
																	<a href="controllers/comment/deletecomment.controller.php?id=<?= $comment['comment_id'] ?>&user_id=<?= $_SESSION['user']['user_id'] ?>" onclick="return functionDelete()" class="btn btn-sm btn-danger-soft btn-round mb-0"><i class="fa fa-trash" style="color:red;margin-top: -0.16rem;"></i></a>
																</div>
															</div>
														</div>
													<?php
												endforeach
													?>
													</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				</div>
				</div>
			</section>


			<!-- =======================
Newsletter END -->
			<div class="container d-flex alin-item-center gap-4 flex-wrap">
				<?php
				$unite = 0;
				if (empty($lessons)) {
					echo "<h1>This page will have lesson Soon....</h1>";
				} else {
					foreach ($lessons as $lesson) :

				?>
						<div id="video-container" class="card p-3 mb-3 mt-3">
							<!-- Embed your video here -->
							<iframe class="card-img-top" width="400" height="315" src="<?= $lesson['document'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
							<div>
								<p class="card-text">Lesson <?= $unite += 1 ?></p>
								<h2 class="card-title"><?= $lesson['lesson_title'] ?></h2>
							</div>
						</div>

				<?php
					endforeach;
				}
				?>
			</div>


			</div>
			</div>
			</div>
			</div>
		</section>




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