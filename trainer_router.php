<?php
session_start();

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$page = "";


if (isset($_SESSION['path']) || isset($_SESSION['teacher'])) {
    $routes = [
        '/trainerdashboard' => 'controllers/trainers/trainerDashboard.controller.php',
        '/trainerdashboards' => 'controllers/trainers/trainercheck.controller.php',
        '/trainer' => 'controllers/trainers/trainerDashboard.controller.php',
        '/' => 'controllers/trainers/trainerDashboard.controller.php',
        '/displaylesson' => 'controllers/lesson/displaylesson.controller.php',
        '/formlessoncreate' => 'controllers/lesson/formcreatelesson.controller.php',
        '/formlessonedit' => 'controllers/lesson/editlesson.controller.php',
        '/editlesson' => 'controllers/lesson/formedit.controller.php',
        '/updatelesson' => 'controllers/lesson/updatelesson.controller.php',
        '/createCourse' => 'controllers/trainerCourse/course.controller.php',
        '/updateCourse' => 'controllers/trainerCourse/formupdateCourses.controller.php',
        '/homepagelesson'=>'controllers/lesson/homepagelesson.controller.php',
        '/displayListStudentTrainer' => 'controllers/trainers/displayListStudentTrainer.controller.php',
    ];
} else {
    $routes = [
        '/trainer' => 'controllers/trainers/trainer.signin.controller.php',






    ];
}

if (array_key_exists($uri, $routes)) {
    $page = $routes[$uri];
} else {
    http_response_code(404);
    $page = 'views/errors/404.php';
}
require "layouts/header.php";
require "layouts/navbar.php";
require $page;
require "layouts/footer.php";

// var_dump($_SESSION['path']);