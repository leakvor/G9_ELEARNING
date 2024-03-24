<?php
require "../../database/database.php";
require "../../models/applyTrainer.model.php";
require "../../models/trainer.model.php";
if(isset($_GET['id'])){
    $apply=getApplyId($_GET['id']);
    $message=notApprovemessage($apply['user_id']);
    $delApply = deleteApply($_GET['id']);
    header("Location: /applytoTrainer");

}
