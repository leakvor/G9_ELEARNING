<?php
session_start();

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$page = "";
if (isset($_SESSION['admin'])) {
    $routes = [
        '/admin' => 'controllers/admin/admin.controller.php',
        '/admins' => 'controllers/admin/admin.controller.php',
        '/trainer-review' => 'controllers/reviews/review.controller.php',
        '/trainer-classroom' => 'controllers/classroom/classroom.controller.php',
        '/displayCategory' => 'controllers/category/displayCategory.controller.php',
        '/createcategory' => 'controllers/category/createCategory.controller.php',
        '/updatecategory' => 'controllers/category/updateCategory.controller.php',

        '/adminTrainer' => 'controllers/trainers/adminTrainer.controller.php',
        '/addTrainer' => 'controllers/trainers/addTrainer.controller.php',
        '/adminCourse' => 'controllers/courses/adminCourse.controller.php',
        '/addCourse' => 'controllers/courses/addCourse.controller.php',
        '/displayStudent' => 'controllers/students/displayStudent.controller.php',
        '/payadmin' => 'controllers/payadmin/payadmin.controller.php',
        '/applytoTrainer'=>'controllers/trainers/displayApplyTrainer.controller.php',

    ];
} else {
    $routes = [
    '/admin' => 'controllers/admin/signin_admin.controller.php',   
    '/adminTrainer' => 'controllers/trainers/adminTrainer.controller.php',
    '/addTrainer' => 'controllers/trainers/addTrainer.controller.php',
    //Course
    '/adminCourse' => 'controllers/courses/adminCourse.controller.php',
    '/addCourse' => 'controllers/courses/addCourse.controller.php',
    '/displayStudent' => 'controllers/students/displayStudent.controller.php',
   

    

    ];
}


if (array_key_exists($uri, $routes)) {
    $page = $routes[$uri];
} else {
    http_response_code(404);
    $page = 'views/errors/404.php';
}
require "layouts/admin/header.php";
require "layouts/admin/navbar.php";
require $page;
require "layouts/admin/footer.php";
