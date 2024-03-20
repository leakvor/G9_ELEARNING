<?php
require "database/database.php";
require "models/course.model.php";
$courses=getCourse();

require "views/trainers/trainerDashboard.view.php";