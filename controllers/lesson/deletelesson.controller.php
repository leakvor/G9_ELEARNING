<?php 
require "../../database/database.php";
require "../../models/lesson.model.php";
if (isset($_GET['id']))
{
    $id = $_GET['id'];
    deleteLesson($id);
}
header('Location: /trainerdashboard');

?>