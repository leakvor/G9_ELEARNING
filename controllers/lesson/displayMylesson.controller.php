<?php
if(isset($_SESSION['id'])){
    $myLesson=$_SESSION['id'];
    // var_dump($myLesson);
}
require ("views/lesson/myLesson.view.php");