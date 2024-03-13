<div class="container-fluid pt-4 px-4" style="overflow-x: auto">
  <div class="form-row" style="display: flex; flex-direction: column;">
    <form style="display: flex;">
      <input class="form-control border-1 mt-3 " style="border: 1px solid gray;flex:3.5 " type="search" id="search" placeholder="Search">
      <button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#myModal" style="margin-left:50%;flex:2; height: 40px;">
        Add new Trainer
      </button>
    </form>
    <!-- ----The Modal--- -->
    <div class="modal" id="myModal">
      <div class="modal-dialog">
        <div class="modal-content" style="background-color: black; border: 1px solid white;">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Form Add new trainer</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <!-- Modal body -->
          <div class="modal-body ">
            <div class="modal-body">
              <form action="/addTrainer" method="post" enctype="multipart/form-data">
                <div class="form-group mt-3">
                  <input type="text" class="form-control bg-white" name="username" placeholder="UserName" id="validationCustom03" required>
                </div>
                <div class="form-group mt-3">
                  <input type="email" class="form-control bg-white" name="email" placeholder="Email" id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" required>
                  <?php if (isset($emailError)) : ?>
                    <span style="color:red"><?php echo $emailError ?></span>
                  <?php endif; ?>

                </div>
                <div class="form-group mt-3">
                  <input type="password" class="form-control bg-white" name="password" placeholder="Password" id="password" required>

                </div>
                <div class="form-group mt-3">
                  <input type="file" class="form-control bg-white" name="img" placeholder="Choose img">
                </div>
                <button type="submit" class="btn btn-danger mt-3">Create</button>
              </form>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-----------------------table category-------------------------- -->
  <div class="table-wrapper-scroll-y my-custom-scrollbar">
    <table class="table table-dark">
      <thead>
        <tr>
          <th scope="col">id</th>
          <th scope="col">FirstName</th>
          <th scope="col">Email</th>
          <!-- <th scope="col">Password</th> -->
          <th scope="col">Img</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($teachers as $index => $teacher) : ?>
          <tr>
            <th scope="row"><?= $index + 1 ?></th>
            <!-- <td><img src="" alt=""></td> -->
            <td><?= $teacher['username'] ?></td>
            <td><?= $teacher['email'] ?></td>
            <!-- <td><?= $teacher['password'] ?></td> -->
            <td><img src="assets/images/instructor/<?= $teacher['img'] ?>" alt="" style="width: 50px;height: 50px;object-fit: cover; border-radius: 50%;"></td>
            <td class="d-flex d-grid gap-3">
              <a class="btn bg-gradient-danger btn-danger" href="controllers/trainers/trainer.delete.controller.php?id=<?= $teacher['user_id'] ?> " onclick="return functionDelete()">
                <i class="fa fa-trash" style="color:white;"></i></a>
              <script>
                function functionDelete() {
                  if (confirm("Are you sure you want to delete this category?")) {

                    return true; // Proceed with deletion
                  } else {
                    return false; // Cancel deletion
                  }
                }
              </script>
              <a href="#" class="btn bg-gradient-danger btn-info">
                <i class="fas fa-edit editIcon" data-toggle="modal" data-target="#editModal<?= $teacher['user_id'] ?>" style="cursor: pointer;color:blue; margin-top:3px"></i>
              </a>
              <div class="modal fade" id="editModal<?= $teacher['user_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel<?= $teacher['user_id'] ?>" aria-hidden="true">
                <!-- ---------form edit--------- -->
                <div class="modal-dialog" role="document">
                  <div class="modal-content" style="background-color: black; border: 1px solid white;">
                    <div class="modal-header">
                      <?php
                      $statement = $connection->prepare("select * from users where user_id=:id");
                      $statement->execute(
                        [':id' => $teacher['user_id']]
                      );
                      $teacher = $statement->fetch();
                      ?>
                      <h5 class="modal-title" id="editModalLabel">Edit Trainer</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form action="controllers/trainers/trainer.update.controller.php" method="post" enctype="multipart/form-data">
                        <div class="form-group mt-3">
                          <input type="hidden" name="id" value="<?= $teacher['user_id'] ?>">
                          <input type="text" class="form-control bg-white" name="username" placeholder="UserName" value="<?= $teacher['username'] ?>">
                        </div>
                        <div class="form-group mt-3">
                          <input type="text" class="form-control bg-white" name="email" placeholder="Email" value="<?= $teacher['email'] ?>">
                        </div>
                        <div class="form-group mt-3">
                          <!-- <input type="password" class="form-control bg-white" name="password" placeholder="Password" id="password" value=""> -->
                        </div>
                        <div class="form-group mt-3">
                          <input type="file" class="form-control bg-white" name="img" placeholder="Choose img">
                        </div>
                        <button class="btn btn-danger mt-3">Edit</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
            </td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
</div>

<script>
  $(document).ready(function() {
    $("#editIcon").click(function() {
      $("#editModal").modal('show');
    });
  });

  document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.querySelector('#search');
    const tableRows = document.querySelectorAll('tbody tr');
    console.log(tableRows);

    searchInput.addEventListener('input', function() {
      const searchTerm = searchInput.value.trim().toLowerCase();

      tableRows.forEach(function(row) {
        const title = row.cells[1].textContent.trim().toLowerCase();

        if (title.includes(searchTerm)) {
          row.style.display = '';
        } else {
          row.style.display = 'none';
        }
      });
    });
  });
</script>