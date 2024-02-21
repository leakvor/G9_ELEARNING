<?php
require '../../layouts/header.php';
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
<body style="background: black;">
    <?php
    require '../../database/database.php';
    $id = $_GET['id'] ? $_GET['id'] : null;
    $statement = $connection->prepare("select * from users where user_id=:id");
    $statement->execute(
        [':id' => $id]
    );
    $teacher = $statement->fetch();
    ?>

    <div class="mt-5 m-auto" style="background-color:black; border: 1px solid white; width:50%;height:65vh; border-radius:15px ">
        <div class="modal-header">
            <h4 class="modal-title" style="color:white">Update Add new trainer</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <form class="m-5" action="../../controllers/trainers/trainer.update.controller.php" method="post">
            <div class="form-group mt-3">
                <input type="hidden" name="id" value="<?= $id ?>">
                <input type="text" class="form-control bg-white" name="username" placeholder="UserName" value="<?= $teacher['username'] ?>">
            </div>
            <div class="form-group mt-3">
                <input type="text" class="form-control bg-white" name="email" placeholder="Email" name="email" value="<?= $teacher['email'] ?>">
            </div>
            <div class="form-group mt-3">
                <input type="password" class="form-control bg-white" name="password" placeholder="Password" id="password" value="<?= $teacher['password'] ?>">
            </div>
            <button class="btn btn-danger mt-3">Update</button>
        </form>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>