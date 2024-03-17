<?php
session_start();
require "../../database/database.php";
require "../../models/student.model.php";

$no_account = "Undefine your account!";
$verify_pass = "Can't verify your password!";
$wrong_password = "Please correct email or password!";
$roles = "You are not a trainer!";

$regex_email = "/^[a-z]{4,10}@[a-z\.]{2,30}\.[a-z]{1,3}$/";
$regex_password = "/^[a-zA-Z\d\!\@\#\$\%]{5,8}$/";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $trainer = accountExist($email);
    $hass_pass = $trainer['password'];
    $role = $trainer['role'];
    if ($role != 'teacher'){
        header('Location: /trainer');
        $_SESSION['trainer'] = $roles;
    }
    else if (count($trainer) > 0){
        if (preg_match($regex_email, $email) && preg_match($regex_password, $password)){
            if (password_verify($password, $hass_pass)){
                $_SESSION['trainer'] = $trainer;
                if (isset($_SESSION['trainer'])) {
                    $_SESSION['path'] = $trainer;
                    header('Location: /trainerdashboard');
                }
            } else {
                $_SESSION['trainer'] = $verify_pass;
                header('Location: /trainer');
            }
        } else {
            $_SESSION['trainer'] = $wrong_password;

            header('Location: /trainer');
        }
    } else {
        $_SESSION['trainer'] = $no_account;
        header('Location: /trainer');
    }
}
