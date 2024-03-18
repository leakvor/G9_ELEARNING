<?php
session_start();
require '../../database/database.php';
require '../../models/admin.model.php';
$adminEmail = 'admin';
$adminPassword = 'admin';
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $adminEmail = $_POST['email'];
    $adminPassword = $_POST['password'];

    $admin = accountExist($adminEmail);

    if (isset($admin)){
        if (($admin['password'] == $adminPassword)){
            $_SESSION['admin'] = $admin;
            header('Location: /admins');
        }else{
            header('Location: /admin');
        }
    }

}