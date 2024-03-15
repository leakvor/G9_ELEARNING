<?php
if(isset($_SESSION['mycourse'])){
    $myLesson=$_SESSION['myLesson'];
    var_dump($myLesson);
}
require ("views/lesson/myLesson.controller.php");