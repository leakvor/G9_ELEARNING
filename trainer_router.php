<?php
session_start();

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$page = "";


if (isset($_SESSION['path'])||isset($_SESSION['teacher'])){
    $routes = [
        '/trainerdashboard' => 'controllers/trainers/trainerDashboard.controller.php',
        '/createCourse' => 'controllers/trainerCourse/course.controller.php',
      '/updateCourse' => 'controllers/trainerCourse/formupdateCourses.controller.php',
      '/trainerViewCourse' => 'controllers/trainerCourse/trainerViewCourse.controller.php',
    
    ];
}else{
        $routes = [
            '/trainer' => 'controllers/trainers/trainer.signin.controller.php',
            // '/trainerViewCourse' => 'controllers/trainerCourse/trainerViewCourse.controller.php',
        
      
            
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