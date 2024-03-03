<?php
session_start();

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$page = "";

// $routes = [
//     '/trainer' => 'controllers/trainers/trainer.signin.controller.php',
//     '/trainerdashboard' => 'controllers/trainers/trainerDashboard.controller.php',
// ];
if (isset($_SESSION['path'])){
    $routes = [
        '/trainerdashboard' => 'controllers/trainers/trainerDashboard.controller.php',
        '/trainer' => 'controllers/trainers/trainerDashboard.controller.php',
        '/'=>'controllers/trainers/trainerDashboard.controller.php',
    ];
}else{
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