<?php
session_start();

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$page = "";

if(isset($_SESSION['user'])){
    $routes = [
        '/'=>'controllers/home/home.controller.php',
        '/trainers' => 'controllers/trainers/trainer.controller.php',
        // LOG------------------->
        '/displayCategory'=>'controllers/category/displayCategory.controller.php',
        '/trainers' => 'controllers/trainers/trainer.controller.php',
        '/profileimg' => 'controllers/profiles/profile.controller.php',
    ];
}else{
    $routes = [
        '/'=>'controllers/home/home.controller.php',
        '/signups' => 'controllers/signup/signup.controler.php',
        '/signins' => 'controllers/signin/signin.controller.php',
        '/listStudent' => 'controllers/trainers/listStudent.controller.php',
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

// echo $_SERVER['REQUEST_URI'];