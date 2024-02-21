<?php
require '../../database/database.php';
require '../../models/category.model.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    var_dump($_POST);
    if (!empty($_POST['cateName']) && !empty($_POST['id'])) {
        $category=$_POST['cateName'];
        $id=$_POST['id'];
        $result=updateCategory($category,$id);
        header('Location:/displayCategory');
    }
}