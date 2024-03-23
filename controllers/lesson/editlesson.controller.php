<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if the 'id' parameter exists in the POST data
    if(isset($_POST['id'])) {
        $id = $_POST['id'];
        // var_dump($id);
        require "views/lesson/editLesson.view.php";
    } 
}

