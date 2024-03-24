<?php
require "../../database/database.php";
require "../../models/applyTrainer.model.php";
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = $_GET['id'];
    $delApply = deleteApply($id);
    header("Location: /applytoTrainer");
}