<?php
// require "../../database/database.php";
// require ("../../models/course.model.php");
if(isset($_SESSION['trainerCourse'])){
    $trainerCourse=($_SESSION['trainerCourse']);
    require "views/trainers/trainerCourse.view.php";

}
    
    
    


