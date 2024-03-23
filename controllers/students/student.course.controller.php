<?php
require '../../database/database.php';
require '../../models/​student_course.model.php';

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $user_id = $_POST['user_id'];
    $course_id = $_POST['course_id'];
    $date_join = $_POST['datejoin'];
    
    $recordStuCou = getcourse_student($user_id, $course_id);
    if (count($recordStuCou) > 0){
        $_SESSION['id'] = $course_id;
        header('Location: /myLessons');
    }else{
        courseStudent($user_id, $course_id, $date_join); 
        $_SESSION['id'] = $course_id;
        header('Location: /myLessons');
    }
}


