
<?php 
require "database/database.php";
require "models/comment.model.php";
$comments=getComment();
var_dump($comments);
require "views/lesson/stu_lesson.php";
?>