<?php
require "../../database/database.php";
require "../../models/category.model.php";
if (isset($_GET['id']))
{
    $id = $_GET['id'];
    deleteCategory($id);
}
header("Location:/displayCategory");
?>