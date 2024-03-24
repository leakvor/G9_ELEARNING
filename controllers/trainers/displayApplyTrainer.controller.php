<?php
require "database/database.php";
require "models/applyTrainer.model.php";
$applyTrainers=getDataApply();
// var_dump($applyTrainers);
require "views/trainers/displayApplyTrainer.view.php";
