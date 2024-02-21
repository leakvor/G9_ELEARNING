<?php
require '../../database/database.php';
require('../../models/trainer.model.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password'])) {
        editTeacher($_POST['username'], $_POST['email'], $_POST['password'], $_POST['id']);
    }
    echo $_POST ['username'] . ' ' . $_POST ['email'] . ' ' . $_POST ['password'] . ' ' . $_POST ['id'];
    header('location: /adminTrainer');
}
$teachers = getTeacher();
require('../../views/trainers/adminTrainer.view.php');
