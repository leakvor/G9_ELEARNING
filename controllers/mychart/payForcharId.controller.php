<?php
require "../../database/database.php";
require "../../models/​student_course.model.php";
session_start();
if(isset($_GET['id'])){
    $id=$_GET['id'];
    deleteChart($_GET['chart_id']);
    $_SESSION['pay_id']=$id;
    $_SESSION['chart']=$_GET['chart_id'];
    header("Location: /payForCourse");
    exit();
}