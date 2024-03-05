<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['title'])) {
        // Retrieve and sanitize form data
        $username = htmlspecialchars($_POST['title']);
    }

}
require "views/trainers/createCourse.view.php";
