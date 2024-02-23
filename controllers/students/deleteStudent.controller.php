<?php 
require "../../database/database.php";
require "../../models/student.model.php";
if (isset($_GET['id']))
{
    $id = $_GET['id'];
    deleteStudent($id);
    
}
header('Location:/displayStudent');
