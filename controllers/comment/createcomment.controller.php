<?php 
require "../../database/database.php";
require "../../models/comment.model.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    var_dump($_POST['course_id']);
    if (!empty($_POST['user_id'])&& !empty($_POST['course_id'])&&!empty($_POST['title']) && !empty($_POST['date'])) {
        if (createComment($_POST['user_id'],$_POST['course_id'],$_POST['title'],$_POST['date'])) {
            header('location: /myLessons');
        }

        
    }
}
