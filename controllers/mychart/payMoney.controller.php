<?php 
if(isset($_SESSION['pay_id'])){
    $id=$_SESSION['pay_id'];
    require ("views/payCourse/payCourse.view.php");
}