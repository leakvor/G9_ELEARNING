<?php
session_start();
require('../../database/database.php');
require('../../models/student.model.php');

$no_account = "Undefine your account!";
$wrong_password = "Please correct email or password!";

$regex_email = "/^[a-z]{4,10}\.[a-z]{1,10}\@[a-z\.]{2,30}\.[a-z]{1,3}$/";
$regex_password = "/^[a-zA-Z\d\!\@\#\$\%]{5,8}$/";



if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    if (preg_match($regex_email, $email) && preg_match($regex_password, $password)){
        echo "corect";
        $_SESSION['acc']='';
        $user = accountExist($email);
        if (count($user) > 0){
            if (password_verify($password, $user['password'])){
                header('Location: /');
                $_SESSION['user'] = $user;
                $_SESSION['acc']='';
            }
        }else{
            echo "incorrect pass!";
            header('Location: /signins');
            $_SESSION['acc'] = $no_account;
        };
    }
    else{
            $_SESSION['acc'] = $wrong_password;
            header('Location: /signins');

    };
   
}