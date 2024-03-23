<?php
if(isset($_SESSION['id'])){
    $id=$_SESSION['id'];
    var_dump($id);
    require ("views/lesson/myLesson.view.php");
}
