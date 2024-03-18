<?php
if(isset($_SESSION['myLesson'])){
    $myLesson=$_SESSION['myLesson'];
    var_dump($myLesson);
}
require ("views/lesson/myLesson.view.php");