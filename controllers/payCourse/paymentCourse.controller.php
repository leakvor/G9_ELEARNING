<?php
require "../../database/database.php";
require "../../models/​student_course.model.php";
require "../../models/lesson.model.php";
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pay = GetpayCourse($_POST['user_id'], $_POST['course_id']);
    $recordStuCou = getcourse_student($_POST['user_id'], $_POST['course_id']);
    if (count($pay) > 0 && count($recordStuCou)>0) {
        $myLesson = displayAlllesson($_POST['course_id']);
        $_SESSION['myLesson'] = $myLesson;
        header("Location: /myLessons");
    } else {
        $myLesson = displayAlllesson($_POST['course_id']);
        $isCreate = paymentCourse($_POST['user_id'], $_POST['course_id'], $_POST['paid'], $_POST['date'], $_POST['numberCard'], $_POST['cvv'], $_POST['nameCard']);
        courseStudent($_POST['user_id'], $_POST['course_id'], $_POST['date']);
        $_SESSION['myLesson'] = $myLesson;
        header("Location: /myLessons");
    }
   
}
