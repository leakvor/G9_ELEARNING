<?php
require 'utils/url.php';
require 'database/database.php';
// if()
// if (urlIs("/admins")){
//     require "controllers/admin/signin_admin.controller.php";
if (urlIs("/admin")|| urlIs("/displayCategory")|| urlIs("/updatecategory") || urlIs("/admin-dasboad") ) { 
    require "admin_router.php";
} else if (urlIs('/signin') || urlIs('/signup')) {
    require "authentication_router.php";
}else{
    require 'router.php';
}


