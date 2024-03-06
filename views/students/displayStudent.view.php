
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
            <td><img src="assets/images/profile/<?= $student["img"] ?>" alt="" style="width: 50px;height: 50px;object-fit: cover; border-radius: 50%;"></td>
              
            <td><a class="btn bg-gradient-danger btn-danger" href="controllers/students/deleteStudent.controller.php?id=<?=$student["user_id"] ?>  "onclick="return functionDelete()">
            <i class="fa fa-trash" style="color:white;"></i></a>
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
