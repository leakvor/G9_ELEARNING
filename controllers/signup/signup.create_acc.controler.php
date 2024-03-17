<?php
session_start();
require('../../database/database.php');
require('../../models/student.model.php');

$is_creat_acc = "Email has already create!";
$is_wrong_validate = "Please correct your validation!";

$regex_email = "/^[a-z\.]{4,20}\@[a-z\.]{2,40}\.[a-z]{1,3}$/";
$regex_password = "/^[a-zA-Z\d\!\@\#\$\%]{5,8}$/";
$regex_first_name = "/^[A-Z][a-z]{1,10}$/";
$regex_last_name = "/^[A-Z][a-z]{1,10}$/";

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $firstName = htmlspecialchars($_POST['firstName']);
    $lastName = htmlspecialchars($_POST['lastName']);
    $username = $firstName ." ". $lastName;
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
   

    $user = accountExist($email);
    if (preg_match($regex_first_name, $firstName) && preg_match($regex_last_name, $lastName) && preg_match($regex_email, $email) && preg_match($regex_password, $password)){
        $password = password_hash(htmlspecialchars($_POST['password']), PASSWORD_BCRYPT);
        echo $password;
        if (count($user) == 0){
            $createAcc = createAcc($username, $email, $password);
            header("Location: /signins");
            $_SESSION['create_acc'] = '';
        }else{
            $_SESSION['create_acc'] = $is_creat_acc;
            header("Location: /signups");
        }
    }
    else{
        $_SESSION['create_acc'] = $is_wrong_validate;
        header("Location: /signups");
    }
}