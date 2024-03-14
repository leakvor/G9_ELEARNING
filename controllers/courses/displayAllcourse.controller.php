<?php

// require "views/courses/displayAllcourse.view.php";
if(isset($_SESSION['displayCourse'])){
    // Retrieve the value from the session
    $displayCourses = $_SESSION['displayCourse'];
    require "views/courses/displayAllcourse.view.php";
}
?>
