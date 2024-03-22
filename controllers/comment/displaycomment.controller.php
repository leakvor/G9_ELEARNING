
<?php 
require "database/database.php";
require "models/comment.model.php";
$comments=displayAllcomment();
var_dump($comments);
require "views/lesson/myLesson.view.php";
?>