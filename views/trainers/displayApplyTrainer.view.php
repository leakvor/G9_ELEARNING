<div class="container-fluid pt-4 px-4">
  <div class="form-row" style="display: flex; flex-direction: column;">
    <form class="d-none d-md-flex ">
      <input class="form-control bg-dark mt-3 mb-3" style="border: 1px solid gray;width:200px" type="search" id="search" placeholder="Search">
    </form>
    <!-- table student -->
    <div class="table-wrapper-scroll-y my-custom-scrollbar">
      <table class="table table-dark">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">document</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <!-------display student------>
        <tbody>
          <?php foreach ($applyTrainers as $index => $applyTrainer) : ?>
            <tr>
              <td><?= $index + 1 ?></td>
              <td><?= $applyTrainer['name'] ?></td>
              <td><?= $applyTrainer['email'] ?></td>
              <td><a href="<?= $applyTrainer['document_apply'] ?>" target="_blank">View Document</a></td>
              <!-- <td></td> -->

              <td>
                <a class="btn bg-gradient-danger btn-success" href="controllers/trainers/appovedTrainer.controller.php?id=<?=$applyTrainer['apply_id']?>" >
                  <i class="fa fa-book" style="color:white;"></i> Approved</a>
                <a class="btn bg-gradient-danger btn-warning" href="controllers/trainers/notApporve.controller.php?id=<?=$applyTrainer['apply_id']?>" >
                  <i class="fa fa-book" style="color:white;"></i>Not Approved</a>
                <a class="btn bg-gradient-danger btn-danger" href="controllers/trainers/deleteApply_trainer.php?id=<?=$applyTrainer['apply_id']?> "onclick="return functionDelete()">
                  <i class="fa fa-trash" style="color:white;"></i></a>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>