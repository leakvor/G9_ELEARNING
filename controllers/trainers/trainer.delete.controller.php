<?php
require "../../database/database.php";
require "../../models/trainer.model.php";


if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = $_GET['id'];

    $deluser = deleteTeacher($id);
    header("Location: /adminTrainer");
}