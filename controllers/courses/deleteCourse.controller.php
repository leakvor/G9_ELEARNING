
<?php
require "../../database/database.php";
require "../../models/course.model.php";

if(isset($_GET['id'])){
    deleteCourse($_GET['id']);
    header('Location: /adminCourse');
}