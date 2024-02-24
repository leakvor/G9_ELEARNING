<div class="container-fluid pt-4 px-4">
      <!-- table student -->
  <div class="table-wrapper-scroll-y my-custom-scrollbar">
    <table class="table table-bordered table-striped mb-0" style="border: 1px solid gray;">
      <thead>
        <tr>
          <th scope="col">id</th>
          <th scope="col">Username</th>
          <th scope="col">Email</th>
          <th scope="col">Password</th>
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
            <td><?= $student['password'] ?></td>
            <td><img src="<?= $student["img"] ?>" alt="" width="50px" style="border-radius: 50%"></td>
            <td><a href="controllers/students/deleteStudent.controller.php?id=<?=$student["user_id"] ?>
            "onclick="return functionDelete()">
            <i class="fa fa-trash" style="color:red;"></i></a>
            <script>
                        function functionDelete() {
                          if (confirm("Are you sure you want to delete this student ?")) {
                            
                            return true;
                          } else {
                            return false;
                          }
                        }
            </script> 
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
