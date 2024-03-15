<?php
require "../../database/database.php";
require "../../models/lesson.model.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $lesson_title = $_POST['lesson_title'];
    $video_url = $_POST['document']; 
    var_dump($lesson_title);
    var_dump($video_url);
    // Access the video URL

    $course_id = $_POST['id'];

    // Check if lesson title and video URL are provided
    if (!empty($lesson_title) && !empty($video_url)) {
        // Assuming you have a function to insert lesson into database
        if (updateLesson($lesson_title, $video_url, $course_id)) {
            // Lesson created successfully, redirect
            header('Location: /trainerdashboard');
            exit();
        } else {
            echo "Error creating lesson.";
        }
    } else {
        echo "Lesson title and video URL are required.";
    }
}
?>