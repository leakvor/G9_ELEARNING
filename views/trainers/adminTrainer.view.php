<div class="container-fluid pt-4 px-4" style="overflow-x: auto">
  <!-- <a href="/addTrainer" class="btn btn-danger">Add new trainer</a> -->
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    Add new trainer
  </button>

  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content" style="background-color: black; border: 1px solid white;">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Form Add new trainer</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>


        <!-- Modal body -->
        <div class="modal-body">
          <div class="modal-body">
            <form action="/addTrainer" method="post" enctype="multipart/form-data">
              <div class="form-group mt-3">
                <input type="text" class="form-control bg-white" name="username" placeholder="UserName">
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control bg-white" name="email" placeholder="Email" name="email">
              </div>
              <div class="form-group mt-3">
                <input type="password" class="form-control bg-white" name="password" placeholder="Password" id="password">
              </div>
              <div class="form-group mt-3">
                <input type="file" class="form-control bg-white" name="img" placeholder="Choose img">
              </div>
              <button class="btn btn-danger mt-3">Create</button>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="table-wrapper-scroll-y my-custom-scrollbar">
  <table class="table table-bordered table-striped mb-0">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">FirstName</th>
        <th scope="col">Email</th>
        <th scope="col">Password</th>
        <th scope="col">Img</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($teachers as $teacher) : ?>
        <tr>
          <th scope="row"><?= $teacher['user_id'] ?></th>
          <!-- <td><img src="" alt=""></td> -->
          <td><?= $teacher['username'] ?></td>
          <td><?= $teacher['email'] ?></td>
          <td><?= $teacher['password'] ?></td>
          <td><img src="assets/images/course/<?= $teacher['img']?>" alt="" width="30px" style="border-radius: 50%;"></td>
          <td class="d-flex d-grid gap-3">
              <a href="controllers/trainers/trainer.delete.controller.php?id=<?= $teacher['user_id'] ?>"> <i class="fa fa-trash" style="color:red;"></i> </a>
              <a href="controllers/trainers/trainer.edit.controller.php?id=<?= $teacher['user_id'] ?>"> <i class="fa fa-edit" style="color:blue;"></i> </a>
            </td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>

</div>
</div>
</div>

