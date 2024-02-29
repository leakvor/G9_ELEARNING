<?php


require('../../database/database.php');
require('../../models/student.model.php');

$no_account = "Undefine your account!";
$wrong_password = "Please correct email or password!";

$regex_email = "/^[a-z]{4,10}\.[a-z]{1,10}\@[a-z]{2,18}\.[a-z]{1,3}$/";
$regex_password = "/^[a-zA-Z\d\!\@\#\$\%]{5,8}$/";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'];
    $password = $_POST['password'];
    if (preg_match($regex_email, $email) && preg_match($regex_password, $password)){
        echo "correct validate!";
    }else{
        echo "Incorrect validate!";
    }
    
}