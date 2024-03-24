<body>
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
        require "database/database.php";
        require "models/student.model.php";
        require "./models/trainer.model.php";
        require "./models/payment.model.php";
		$trainer_email = $trainer['email'];
        $students=countCoursesPerStudent($trainer['user_id']);
        // var_dump($students);
        $trainer_data = accountExist($trainer_email);
        if (isset($trainer)){
          $trainer_profile = 'assets/images/instructor/' . $trainer_data['img'];
          if (isset($trainer_profile)){
            
          }
        }
        
        $tra_student = trainer_students($trainer_email);
        $paidToday=totalTodayTrainer($trainer['user_id']);
        $paidThismonth=totalthisMonthTrainer($trainer['user_id']);
        $paidAll=totalAll(($trainer['user_id']));
        $selingCourse=sellingCourse($trainer['user_id']);
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
                  </div>
                  <!-- Button -->
                  <div class="d-flex align-items-center mt-2 mt-md-0">
                    <form action="/createCourse" method="post">
                      <input type="hidden" value="<?= $trainer['user_id'] ?>" name="id">
                      <button class="btn btn-success mb-0">Create a course</button>
                    </form>
                    
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
                      <a class="list-group-item " href="#"><i class="bi bi-ui-checks-grid fa-fw me-2"></i>Dashboard</a>
                      <a class="list-group-item " href="controllers/trainers/displatTrainerId.controller.php?id=<?= $trainer['user_id'] ?>"><i class="bi bi-people fa-fw me-2"></i>Students</a>
                   	<!-- <a class="list-group-item " href="/displayAllmycourse"><i class="bi bi-trash fa-fw me-2"></i>My Course</a> -->
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
                      <h5 class="purecounter mb-0 fw-bold" data-purecounter-start="0" data-purecounter-end="<?=count($students)?>" data-purecounter-delay="200"><?=count($students)?></h5>
                    </div>
                    <span class="mb-0 h6 fw-light">Total Students</span>
                  </div>
                </div>
                <hr class="mt-2 custom-hr active_bars" style="display:none">
              </div>
            </div>
            <!-- Counter boxes END -->

            <!-- display teacher cours name -->
            <div class="d-flex gap-2 mt-3">
              <?php
                foreach($tra_student as $item){
              ?>
                <div class="card text-white bg-success mb-3 all_courses" style="max-width: 18rem; display:none">
                  <div class="card-header text-white bg-dark"><?= $item['course_img']?></div>
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
                      <span class="badge bg-dark text-white">Total Today</span>
                      <h4 class="text-primary my-2"><?= $paidToday['total_paid_today'] !== null ? $paidToday['total_paid_today'] : '0' ?>$</h4>
                    </div>
                    <!-- Content -->
                    <div class="col-sm-6 col-md-4">
                      <span class="badge bg-dark text-white">This months</span>
                      <h4 class="text-primary my-2"><?= $paidThismonth['total_paid_month'] !== null ? $paidThismonth['total_paid_month'] : '0' ?>$</h4>
                    </div>
                    <div class="col-sm-6 col-md-4">-
                      <span class="badge bg-dark text-white">Total all</span>
                      <h4 class="text-primary my-2"><?= $paidAll['total_paid_all'] !== null ? $paidAll['total_paid_all'] : '0' ?>$</h4>
                    </div>
                  </div>
                  <h3 style="margin-top: 10px;">Selling Course</h3>
                  <!-- Apex chart -->
                  <div id="Chart"></div>
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
                      <h3 class="mb-2 mb-sm-0">My Courses</h3>
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
                            <th scope="col" class="border-0">Paid</th>
                            <th scope="col" class="border-0 rounded-end">Action</th>
                          </tr>
                        </thead>
                        <!-- Table body START -->
                        <tbody>
                        
                        <tr>                
                        <?php 
                          foreach ($tra_student as $course):
                          if (isset($_SESSION['trainer'])){
                            $path="controllers/lesson/displayEachlesson.controller.php"."?course=" . $course['course_id'];
                                
                          }else{
                            echo 'NOT SET!';
                          }
                        ?>
                        <!-- Table body START -->
                        <tbody>
                          <!-- Table item -->
                          <tr>
                            <!-- Course item -->
                            <td>
                              <div class="d-flex align-items-center">
                                <!-- Image -->
                                <div class="w-100px w-md-60px">
                                <a href="<?=$path?>"><img src="assets/images/course/<?= $course['course_img'] ?>" alt="" style="width: 100%; height: 60px; object-fit: cover;"></a>
                                </div>
                                <!-- Title -->
                                <h6 class="mb-0 ms-2">
                                  <a href="<?=$path?>"><?= $course["title"]; ?></a>
                                </h6>
                              </div>
                            </td>
                            <!-- Selling item -->
                            <!-- <td><?= $course["cateName"]; ?></td> -->
                            <!-- Amount item -->
                            <td><?= $course["paid"]."$"; ?></td>
                            <!-- Action item -->
                            <td>
                              
                              <a href="controllers/trainerCourse/editcourse.controller.php?id=<?=$course["course_id"] ?>" class="btn btn-sm btn-success-soft btn-round me-1 mb-0"><i class="far fa-fw fa-edit"></i></a>
                              <a href="controllers/trainerCourse/deleteCourse.controller.php?id=<?=$course["course_id"] ?>" class="btn btn-sm btn-danger-soft btn-round mb-0" onclick="return functionDelete()">
                            <i class="fas fa-fw fa-times"></i></a>
                            </td>
                          </tr>
                        </tbody>
                        <?php endforeach; ?>
      
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

<?php

$courseSellingData = sellingCourse($trainer['user_id']);
?>

<!-- Add this script inside your HTML body where you want to display the chart -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script>
    // JavaScript code to initialize and update ApexCharts
    document.addEventListener('DOMContentLoaded', function () {
        var courseSellingData = <?php echo json_encode($courseSellingData); ?>;

        var options = {
            series: [{
                data: courseSellingData.map(function (item) {
                    return {
                        x: item.title,
                        y: item.student_count
                    };
                })
            }],
            chart: {
                type: 'bar',
                height: 350,
                toolbar: {
                    show: false
                }
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',
                    endingShape: 'rounded'
                },
            },
            dataLabels: {
                enabled: false
            },
            xaxis: {
                type: 'category',
                labels: {
                    rotate: -45,
                    style: {
                        fontSize: '12px'
                    }
                }
            },
            yaxis: {
                title: {
                    text: 'Selling Course'
                }
            },
            tooltip: {
                shared: false,
                y: {
                    formatter: function (val) {
                        return val;
                    }
                }
            }
        };

        var chart = new ApexCharts(document.querySelector("#Chart"), options);
        chart.render();
    });
</script>

</body>



