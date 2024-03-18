<?php 
require "../../database/database.php";
require "../../models/​student_course.model.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $isCreate=paymentCourse($_POST['user_id'],$_POST['course_id'],$_POST['paid'],$_POST['date'],$_POST['numberCard'],$_POST['cvv'],$_POST['nameCard']);
    var_dump($isCreate);
    // if($isCreate){
    //     echo "ok";
    // }else{
    //     echo"nono";
    // }
}
