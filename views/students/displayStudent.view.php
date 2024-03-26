<div class="container-fluid pt-4 px-4">
<div class="form-row" style="display: flex; flex-direction: column;">
<form class="d-none d-md-flex " >
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
          <th scope="col">Img</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <!-------display student------>
      <tbody>
      <?php 
          foreach ($students as $index =>$student):
        ?>
        <tr>
            <td><?= $index+1 ?></td>
            <td><?= $student['username'] ?></td>
            <td><?= $student['email'] ?></td>
            <td><img src="../../assets/images/instructor/<?= $student["img"] ?>" alt="" style="width: 40%; height: 70px; object-fit: cover;border-radius: 50%;"></td>
            <td><a class="btn bg-gradient-danger btn-danger" href="controllers/students/deleteStudent.controller.php?id=<?=$student["user_id"] ?> " onclick="return functionDelete()">
                <i class="fa fa-trash" style="color:white;"></i></a></td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
