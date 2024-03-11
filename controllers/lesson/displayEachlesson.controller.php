<?php
require "../../database/database.php";
require "../../models/lesson.model.php";

// Start the session
session_start();


if(isset($_GET['course'])){
    $id = intval($_GET['course']);

    $displayLessons = displayAlllesson($id);

    $_SESSION['course_id'] = $id;
    
    // Set the value in the session variable
    $_SESSION['displaylessons'] = $displayLessons;

    // var_dump($_SESSION['displaylessons']);

    // Redirect to the appropriate view file
    header("Location: /displaylesson");
    exit(); // It's good practice to exit after a header redirect to prevent further execution
}