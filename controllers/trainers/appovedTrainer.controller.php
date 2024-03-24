<?php
require "../../database/database.php";
require "../../models/applyTrainer.model.php";
require "../../models/trainer.model.php";
if(isset($_GET['id'])){
    $apply=getApplyId($_GET['id']);
    $img="profile.jpg";
    updateRole($apply['user_id']);
    $message=message($apply['user_id']);
    $delApply = deleteApply($_GET['id']);
    header("Location: /applytoTrainer");

}
