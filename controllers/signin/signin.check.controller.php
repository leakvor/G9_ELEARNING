<?php
session_start();
require('../../database/database.php');
require('../../models/student.model.php');


if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    $user = accountExist($email);
    if (count($user) > 0){
        if (password_verify($password, $user['password'])){
            header('Location: /');
            $_SESSION['user'] = $user;
            // $_SESSION['success'] = "Login account succesfuly";
        }else{
            echo "incorrect pass!";
            header('Location: /signins');
        };
    }
   
}