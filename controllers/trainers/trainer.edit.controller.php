<?php
require '../../database/database.php';
$id = isset($_GET['id']) ? $_GET['id'] : null;
if ($id !== null) {
    require '../../models/trainer.model.php';
    $edituser = getTeacher($id);
    require '../../views/trainers/trainer.edit.view.php';
};