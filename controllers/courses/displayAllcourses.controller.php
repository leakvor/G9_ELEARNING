<?php
require "../../database/database.php";
require "../../models/course.model.php";

// Start the session
session_start();

if(isset($_GET['category'])){
    $id = $_GET['category'];
    
    $displayCourses = displayAllcourse($id);
    
    
    // Set the value in the session variable
    $_SESSION['displayCourse'] = $displayCourses;
    
    // Redirect to the appropriate view file
    header("Location: /displayAllcourse");
    exit(); // It's good practice to exit after a header redirect to prevent further execution
}  
