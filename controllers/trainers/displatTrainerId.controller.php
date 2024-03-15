<?php
require ("../../database/database.php");
require ("../../models/trainer.model.php");

session_start();
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $allStudent=displayStudent($id);
    $_SESSION['student']=$allStudent;
    var_dump($allStudent);
    header("Location: /displayListStudentTrainer");
    exit();
}