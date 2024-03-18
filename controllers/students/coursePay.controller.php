<?php 
if(isset($_SESSION['pay_id'])){
    $id=$_SESSION['pay_id'];
    require ("views/students/student_pay.view.php");
}