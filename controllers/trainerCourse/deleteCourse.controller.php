<?php
require "../../database/database.php";
require("../../models/course.model.php");
if (isset($_GET['id']))
{
    $id = $_GET['id'];
    deleteCourse($id);
}
header('Location: /trainerdashboard');
?>