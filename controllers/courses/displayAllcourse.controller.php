<?php
require "../../database/database.php";
require "../../models/course.model.php";
if(isset($_GET['category'])){
    // Retrieve the value of the 'category' parameter
    $category = $_GET['category'];
    $displayCourses=displayAllcourse($category);
    // var_dump($displayCourse);
}  

require "../../views/courses/displayAllcourse.view.php";