<?php
// Start the session
// session_start();

// Check if the session variable is set
if(isset($_SESSION['displayCourse'])){
    // Retrieve the value from the session
    $displayCourses = $_SESSION['displayCourse'];
    require "views/courses/displayAllcourse.view.php";
}
?>
