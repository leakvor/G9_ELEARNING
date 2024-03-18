<!-- -------------form category------ -->

<div class="container-fluid pt-4 px-4" style="overflow-x: auto">
<div class="form-row" style="display: flex; flex-direction: column;">
  <form style="display: flex;">
    <input class="form-control border-1 mt-3 " style="border: 1px solid gray;flex:3.5 " type="search" id="search" placeholder="Search">
    <button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#myModal" style="margin-left:50%;flex:2; height: 40px;" >
    Add new Category
  </button>
  </form>
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
                <input type="text" class="form-control bg-white" name="cateName" id="cateName"  placeholder="Category">
              </div>
              <small class="text-danger" id="p"></small>
              <div class="form-group mt-3">
                <input type="file" class="form-control bg-white" name="image" id="image" placeholder="Choose image">
              </div>
          </div>
          <!-- Modal footer -->
          <div class="modal-footer">
            <!-- <a href="" class="btn btn-danger">Create</a> -->
            <button id="submitBtn" type="submit" name="submit" class="btn btn-danger" disabled>Create</button>

          </div>
          </form>
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
          <th scope="col">Name Category</th>
          <th scope="col">images</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($categorys as $index => $category) : ?>

          <tr>
            <th scope="row"><?= $index + 1 ?></th>
            <td><?= $category['cateName'] ?></td>
            <td><img src="assets/images/category/<?= $category['image'] ?>" alt="" style="width: 25%; height: 80px; object-fit: cover;"></td>
            <td><a class="btn bg-gradient-danger btn-danger" href="controllers/category/deleteCategory.controller.php?id=<?= $category['cat_id'] ?>
            " onclick="return functionDelete()">
                <i class="fa fa-trash" style="color:white;"></i></a>
              <a href="#" class="btn bg-gradient-danger btn-info">
                <i class="fas fa-edit editIcon" data-toggle="modal" data-target="#editModal<?= $category['cat_id'] ?>" style="cursor: pointer;color:white;"></i>
              </a>

              <div class="modal fade" id="editModal<?= $category['cat_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel<?= $category['cat_id'] ?>" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content" style="background-color: black; border: 1px solid white;">
                    <div class="modal-header">
                      <h5 class="modal-title" id="editModalLabel">Edit Category</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>

                    <div class="modal-body">
                      <form action="controllers/category/updateCategory.controller.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                          <label for="category">Name Category:</label>
                          <input type="hidden" name="id" value="<?= $category['cat_id'] ?>">
                          <div class="form-group">
                            <input type="text" class="form-control bg-white" value="<?= $category['cateName'] ?>" name="cateName">
                          </div>
                          <div class="form-group mt-3">
                            <input type="file" class="form-control bg-white" name="img" placeholder="Choose img" value="$category['image']">
                          </div>
                        </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-danger">Update</button>
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
  </div>
 