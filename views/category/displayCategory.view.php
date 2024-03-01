<!-- -------------form category------ -->
<div class="container-fluid pt-4 px-4" style="overflow-x: auto">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    Add new Category
  </button>

<!-- ----The Modal--- -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content" style="background-color:black;border:1px solid white;">
  <!-- -----Modal Header---- -->
  <div class="modal-header">
    <h4 class="modal-title">Form Add new Category</h4>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
  </div>
  <!-- ----Madal body--- -->
  <div class="modal-body">
    <div class="modal-body">
    <form action="controllers/category/createCategory.controller.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="category">Name category:</label>
                    <input type="text" class="form-control bg-white" name="cateName" id="cateName">
                </div>
                <small class="text-danger" id="p"></small>
                <div class="form-group mt-3">
                <input type="file" class="form-control bg-white" name="image" id="image" placeholder="Choose image">
              </div>
        </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <!-- <a href="" class="btn btn-danger">Create</a> -->
                    <button id="submitBtn" type="submit" name="submit" class="btn btn-danger" disabled >Create</button>
                    
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>

  <!-----------------------table category-------------------------- -->
  <div class="table-wrapper-scroll-y my-custom-scrollbar">
    <table class="table table-bordered table-striped mb-0"style="margin-top:15px">
      <thead>
        <tr style="border: 1px solid gray;">
          <th scope="col">id</th>
          <th scope="col">Name Category</th>
          <th scope="col">images</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach ($categorys as $index => $category):?>
        
            <tr style="border: 1px solid gray;">
            <th scope="row" ><?= $index+1 ?></th>
            <td><?= $category['cateName'] ?></td>
            <td><img src="assets/images/category/<?= $category['image'] ?>" alt="" width="60px" height="60px"  ></td>
            <td><a href="controllers/category/deleteCategory.controller.php?id=<?=$category['cat_id'] ?>
            "onclick="return functionDelete()">
            <i class="fa fa-trash" style="color:red;"></i></a>
            <script>
                        function functionDelete() {
                          if (confirm("Are you sure you want to delete this category?")) {
                            
                            return true; // Proceed with deletion
                          } else {
                            return false; // Cancel deletion
                          }
                        }
            </script>
            <i class="fas fa-edit editIcon" data-toggle="modal" data-target="#editModal<?=$category['cat_id'] ?>" style="cursor: pointer;color:blue;"></i>
            <div class="modal fade" id="editModal<?=$category['cat_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel<?=$category['cat_id'] ?>" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content" style="background-color: black; border: 1px solid white;">
                    <div class="modal-header">
                      <h5 class="modal-title" id="editModalLabel">Edit Category</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <!-- <?php 
                      // $id=$_GET['id'];
                      // $statement = $connection->prepare("select * from category where cat_id=:id");
                      // $statement->execute([':id' => $id]);

                      // $category=$statement->fetch();
                    ?> -->

                    <div class="modal-body">
                    <form action="controllers/category/updateCategory.controller.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="category">Name Category:</label>
                    <input type="hidden" name="id"
                     value="<?= $category['cat_id'] ?>">
                <div class="form-group">
                    <input type="text" class="form-control bg-white"
                     value="<?=$category['cateName']?>" name="cateName">
              </div>
              <div class="form-group mt-3">
                          <input type="file" class="form-control bg-white" name="image" placeholder="Choose img" value="$category['image']">
              </div>
        </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    
                    <button type="submit"class="btn btn-danger">Update</button>
                </div>
            </form>
                    </div>
                  </div>
                </div>
              </div>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>

  </div>
  <script>
  const input = document.querySelector("#cateName");
  const submitBtn = document.querySelector("#submitBtn");
  const p = document.querySelector("#p");
  input.addEventListener("input", (e) => {
    console.log(input.value);
    checkInput(input.value);
    submitBtn.removeAttribute("disabled");
  });

  const regex = /^[a-zA-Z\s]{3,20}$/;
  console.log(regex)
  function checkInput(text) {
    let category = regex.test(text);
    if (category) {
      p.textContent = "Success for create category";
    } else {
      p.textContent = "Please enter a category between 3 and 20 characters, containing only letters and spaces.";
    }
  }
</script>
