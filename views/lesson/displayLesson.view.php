<body>
  
  <!-- Header END -->

  <!-- **************** MAIN CONTENT START **************** -->
  <main>

<!-- =======================
Page Banner START -->

    <section class="pt-0">
      <!-- Main banner background image -->
      <?php
        if (isset($_SESSION['trainer'])){
          $trainer = ($_SESSION['trainer']);
          // var_dump($trainer);
        }else{
          echo 'NOT SET!';
        }
        require('database/database.php');
        require('models/student.model.php');
        require('models/trainer.model.php');

        $trainer_email = $trainer['email'];
        $trainer_data = accountExist($trainer_email);
        if (isset($trainer)){
          $trainer_profile = 'assets/images/instructor/' . $trainer_data['img'];
        }
        
        $tra_student = trainer_students($trainer_email);
        
      ?>
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
                  </div>
                  <?php 
                  
                  ?>
                  <!-- Button -->
                  <div class="d-flex align-items-center mt-2 mt-md-0">
                    <form action="/formlessoncreate" method='post'>
                      <!-- ------------------------------------------------------------------------------------------- -->
                      <?php
                        if (isset( $_SESSION['displaylessons'])){
                          $displaylessons = $_SESSION['displaylessons'];
                          if (isset($_SESSION['course_id'])){
                            $course_id = $_SESSION['course_id'];
                          }
                        }
                      ?>
                      <input type="hidden" value="<?=$course_id?>" name="id">
                      <?php
                      // var_dump($displaylessons['course_id'])
                      ?>
                    <button  class="btn btn-success mb-0">Create a Lesson</button>
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

        <div class="card-header border-bottom">
          <div class="d-sm-flex justify-content-sm-between align-items-center">
            <h3 class="mb-2 mb-sm-0">Most Selling Lesson</h3>
            <a href="#" class="btn btn-sm btn-primary-soft mb-0">View all</a>
        </div>
      </div>
                  <!-- Card header END -->
      <div class="card-body">
        <div class="table-responsive-lg border-0 rounded-3">
          <!-- Table START -->
          <table class="table table-dark-gray align-middle p-4 mb-0">
                        <!-- Table head -->
            <thead>
              <tr>
                <th scope="col" class="border-0 rounded-start">Document</th>
                <th scope="col" class="border-0 ">Lesson Name</th>
                <th scope="col" class="border-0 rounded-end">Action</th>
              </tr>
            </thead>
                        <!-- Table body START -->
            <tbody>
<!-- ====================================for loop============================================= -->
            <?php  
            foreach ($displaylessons as $lesson):
            // var_dump($lesson)
            ?>
                         
            <!-- Course item -->
            <!-- document item -->
            <td>
              <iframe width="200" height="100" src="<?= $lesson['document']?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </td>
            <td>
              <div class="d-flex align-items-center">                  
                <!-- Title -->
                <h6 class="mb-0 ms-2">
                  <a href="#"​><?= $lesson['lesson_title']?></a>
                </h6>
              </div>
            </td>
            <td style="display: flex;margin-top:30px;">
              <form action="/formlessonedit" method='post' style=" margin-bottom:50px;">
                <input type="hidden" value="<?=$lesson['lesson_id']; ?>" name="id">
                <button type="submit" class="btn btn-sm btn-success-soft btn-round me-1 mb-0"><i class="far fa-fw fa-edit"></i></button>
              </form>
              <a href="../../controllers/lesson/deletelesson.controller.php?id=<?=$lesson['lesson_id'] ?>"onclick="return functionDelete()"class="btn btn-sm btn-danger-soft btn-round mb-0"><i class="fas fa-fw fa-times"></i></a>
                <script>
                  function functionDelete() {
                    if (confirm("Are you sure you want to delete this lesson?")) {
                                              
                    return true; // Proceed with deletion
                    } else {
                      return false; // Cancel deletion
                    }
                  }
                </script>
              </td>
              </tr>
                <?php endforeach?>
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

</body>

