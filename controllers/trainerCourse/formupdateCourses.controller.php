<?php 
if(isset($_SESSION['id'])){
    // Retrieve the value from the session
    $id = $_SESSION['id'];
    require "views/trainers/editCourse.view.php";
}
