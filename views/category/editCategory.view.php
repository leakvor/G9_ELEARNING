<?php
require '../../database/database.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<?php 
    $id=$_GET['id'];
    $statement = $connection->prepare("select * from category where cat_id=:id");
    $statement->execute([':id' => $id]);
    $category=$statement->fetch();
    ?>


<body style="background: black;">
    <div class="mt-5 m-auto" style="background-color:black; border: 1px solid white; width:50%;height:65vh; border-radius:15px ">
        <div class="modal-header">
            <h4 class="modal-title" style="color:white">Edit Category</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <form class="m-5" action="../../controllers/category/updateCategory.controller.php" method="post">
            <input type="hidden" name="id"
            ​value="<?= $category['cat_id'] ?>">
            <div class="form-group">
                    <label for="categorys" style="color:red; font-size:20px">Name category:</label>
                    <input type="text" class="form-control bg-white"
                     value="<?=$category['cateName']?>" name="cateName">
            </div>
            <div class="form-group">
                <input type="hidden" name="id" value=<?= $category['cat_id']?>>
            </div>

            <button class="btn btn-danger mt-3">Upload</button>
        </form>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
 integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
 crossorigin="anonymous"></script>
</html>