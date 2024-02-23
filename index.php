<?php

require 'utils/url.php';
require 'database/database.php';

if (urlIs("/admins")){
    require "controllers/admin/signin_admin.controller.php";
}
else if (urlIs("/admin")|| urlIs("/displayCategory")|| urlIs("/updatecategory") || urlIs("/admin-dasboad") || urlIs("/adminTrainer")|| urlIs("/addTrainer") || urlIs("/adminCourse")|| urlIs("/addCourse") || urlIS("/displayStudent")) { 
    require "admin_router.php";
} else if (urlIs('/signin') || urlIs('/signup')) {
    require "authentication_router.php";
}else{
    require 'router.php';
}


