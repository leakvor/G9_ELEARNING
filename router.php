<?php
session_start();

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$page = "";
$routes = [
    '/'=>'controllers/home/home.controller.php',
    '/trainers' => 'controllers/trainers/trainer.controller.php',
    // LOG------------------->
    '/signups' => 'controllers/signup/signup.controler.php',
    '/signins' => 'controllers/signin/signin.controller.php',
    // '/trainers' => 'controllers/trainers/trainer.controller.php',
    '/displayCategory'=>'controllers/category/displayCategory.controller.php',
    '/trainers' => 'controllers/trainers/trainer.controller.php',
];

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
