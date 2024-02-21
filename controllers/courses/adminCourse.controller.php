
<?php 
require "database/database.php";
require "models/course.model.php";
$courses=getCourse();
require "views/courses/adminCourse.view.php";