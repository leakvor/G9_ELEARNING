<?php
require 'utils/url.php';
require 'database/database.php';

if (urlIs("/admins") || urlIs("/admin") || urlIs("/displayCategory") || urlIs("/updatecategory") || urlIs("/admin-dasboad") || urlIs("/adminTrainer") || urlIs("/addTrainer") || urlIs("/adminCourse") || urlIs("/addCourse") || urlIS("/displayStudent") || urlIs("/payadmin") ||urlIs("/applytoTrainer")) {
    require "admin_router.php";
} else if (urlIs('/signin') || urlIs('/signup')) {
    require "authentication_router.php";
} else if (urlIs('/trainer') || urlIs('/trainerdashboard') || urlIs('/displaylesson') || urlIs('/formlessoncreate') || urlIs('/formlessonedit') || urlIs('/updatelesson') || urlIs("/createCourse") || urlIs("/updateCourse") || urlIs("/homepagelesson")) {
    require 'trainer_router.php';
} else {
    require 'router.php';
}
