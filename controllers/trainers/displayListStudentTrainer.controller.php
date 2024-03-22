<h1>leak</h1>
<?php

if(isset($_SESSION['student'])){
    $allStudent=$_SESSION['student'];
}
require "views/trainers/displayListStudentTrainer.view.php";

