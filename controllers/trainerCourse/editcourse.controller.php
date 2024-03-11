<?php

session_start();

if (isset($_GET['id'])) {
    $id=$_GET['id'];
    $_SESSION['id']=$id;
    var_dump($id);
    header("Location: /updateCourse");
    exit();
}
?>