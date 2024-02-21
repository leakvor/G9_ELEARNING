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
    <form action="controllers/category/createCategory.controller.php" method="post">
                <div class="form-group">
                    <label for="category">Name category:</label>
                    <input type="text" class="form-control bg-white" name="cateName">
                </div>
        </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <!-- <a href="" class="btn btn-danger">Create</a> -->
                    <button type="submit"class="btn btn-danger">Create</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>

  <!-----------------------table category-------------------------- -->
  <div class="table-wrapper-scroll-y my-custom-scrollbar">
    <table class="table table-bordered table-striped mb-0">
      <thead>
        <tr>
          <th scope="col">id</th>
          <th scope="col">Name Category</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach($categorys as $category):?>
        
          <tr>
            <th scope="row"><?= $category['cat_id'] ?></th>
            <td><?= $category['cateName'] ?></td>
            <td><i class="fa fa-trash" style="color:red;"><a href=""></a></i>
              <i class="fa fa-edit" style="color:blue;"><a href=""></a></i>
            </td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>

  </div>