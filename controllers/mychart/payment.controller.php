<?php
require "../../database/database.php";
require "../../models/​student_course.model.php";
require "../../models/lesson.model.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $myLesson = displayAlllesson($_POST['course_id']);
    $pay = GetpayCourse($_POST['user_id'], $_POST['course_id']);
    if (count($pay) > 0) {
        $_SESSION['myLesson'] = $myLesson;
        header("Location: /myLessons");
    } else {
        $isCreate = paymentCourse($_POST['user_id'], $_POST['course_id'], $_POST['paid'], $_POST['date'], $_POST['numberCard'], $_POST['cvv'], $_POST['nameCard']);
        $_SESSION['myLesson'] = $myLesson;
        header("Location: /myLessons");
    }
   
}
