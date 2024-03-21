
<?php

// Start the session
session_start();
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $_SESSION['id']=$id;
    header("Location: /trainerCourse");
    exit();
}  

