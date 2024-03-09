<?php
require "../../database/database.php";
require "../../models/lesson.model.php";

// Start the session
session_start();

if(isset($_GET['course'])){
    $id = $_GET['course'];
    $displayLessons = displayAlllesson($id);
    
    // Set the value in the session variable
    $_SESSION['displaylessons'] = $displayLessons;

    // Redirect to the appropriate view file
    header("Location: /displaylesson");
    exit(); // It's good practice to exit after a header redirect to prevent further execution
}