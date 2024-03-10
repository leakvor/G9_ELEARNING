<?php
// Check if the session variable is set
if(isset($_SESSION['displaylessons'])){
    // Retrieve the value from the session
    $displaylessons = $_SESSION['displaylessons'];
    require "views/lesson/displayLesson.view.php";
}


