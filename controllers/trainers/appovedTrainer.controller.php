<?php
require "../../database/database.php";
require "../../models/applyTrainer.model.php";
require "../../models/trainer.model.php";
if(isset($_GET['id'])){
    $apply=getApplyId($_GET['id']);
    $img="profile.jpg";
    $password = $apply['password'];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $message=message($apply['email'],$apply['password'],$apply['user_id']);
    $delApply = deleteApply($id);
    header("Location: /applytoTrainer");
}
