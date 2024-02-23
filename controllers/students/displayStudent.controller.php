<?php 
require "database/database.php";
require "models/student.model.php";
$students=getStudent();
require "views/students/displayStudent.view.php";