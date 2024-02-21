<?php
require 'utils/url.php';
require 'database/database.php';
if (urlIs("/admins")){
    require "controllers/admin/signin_admin.controller.php";
}
else if (urlIs("/admin") || urlIs("/admin-dasboad")) { 
    require "admin_router.php";
} else if (urlIs('/signin') || urlIs('/signup')) {
    require "authentication_router.php";
}else{
    require 'router.php';
}


