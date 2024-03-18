<?php 
require "../../database/database.php";
require "../../models/​student_course.model.php";
if (isset($_GET['id']))
{
    $id = $_GET['id'];
    deleteChart($id);
    
}
header('Location: /displayChart');