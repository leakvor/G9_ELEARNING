<?php
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$page = "";
$routes = [
    '/admins' => 'controllers/admin/signin_admin.controller.php',
    '/admin' => 'controllers/admin/admin.controller.php',
    '/trainer-review' => 'controllers/reviews/review.controller.php',
    '/trainer-classroom' => 'controllers/classroom/classroom.controller.php',
    '/displayCategory'=>'controllers/category/displayCategory.controller.php',
    '/createcategory'=>'controllers/category/createCategory.controller.php',
    '/updatecategory'=>'controllers/category/updateCategory.controller.php',

];

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