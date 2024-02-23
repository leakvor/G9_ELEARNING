<h1>leak</h1>
<?php
require "../../database/database.php";
require "../../models/course.model.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $title = htmlspecialchars($_POST['title']);
        // $img = htmlspecialchars($_POST['img']);
        $teacher = htmlspecialchars($_POST['teacher']);
        $category = htmlspecialchars($_POST['category']);
        updateCourse($title,$teacher,$category);
        header('Location: /adminCourse');
}
