<?php
// Start the session
require ("../../models/course.model.php");
session_start();
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $trainerCourse=trainerCourse($id);
    $_SESSION['trainerCourse']=$trainerCourse;
    header("Location: /trainerCourse");
}  
?>