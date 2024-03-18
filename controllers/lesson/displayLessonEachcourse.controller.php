<?php 
require "../../database/database.php";
require "../../models/lesson.model.php";

session_start();
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $allLesson=displayAlllesson($id);
    $_SESSION['myLesson']=$allLesson;
    var_dump($allLesson);
    header("Location: /myLessons");
    exit();
}
