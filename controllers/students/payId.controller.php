<?php
session_start();
if(isset($_GET['id'])){
    $id=$_GET['id'];
    var_dump($id);
    $_SESSION['pay_id']=$id;
    header("Location: /coursePay");
    exit();
}