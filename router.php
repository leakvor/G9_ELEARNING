<?php
session_start();


$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$page = "";

if(isset($_SESSION['user'])||isset($_SESSION['teacher'])){
    $routes = [
        '/'=>'controllers/home/home.controller.php',
        '/trainers' => 'controllers/trainers/trainer.controller.php',
        '/signins' => 'controllers/home/home.controller.php',
        '/displayCategory'=>'controllers/category/displayCategory.controller.php',
        '/profileimg' => 'controllers/profiles/profile.controller.php',
        '/displayAllcourse' => 'controllers/courses/displayAllcourse.controller.php',
        '/coursepay' => 'views/students/student_pay.view.php',
        '/studentDashboard' => 'controllers/students/studentDashboard.controller.php',
        '/trainerCourse'=>'controllers/courses/trainerCourse.controller.php',
        '/stu_lesson' => 'controllers/students/stu_lesson.view.controller.php',
        '/displaystudentCourse' => 'controllers/courses/displaystudentCourse.controller.php',
        '/myLessons' => 'controllers/lesson/displayMylesson.controller.php',
    ];
}else{
    $routes = [
        '/'=>'controllers/home/home.controller.php',
        '/signups' => 'controllers/signup/signup.controler.php',
        '/signins' => 'controllers/signin/signin.controller.php',
        '/trainer' => 'controllers/trainers/signinTrainer.controller.php',
        

       
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

// already