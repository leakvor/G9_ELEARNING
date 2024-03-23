
<?php
if(isset($_SESSION['id'])){
    $id=$_SESSION['id'];
    require("views/trainers/trainerCourse.view.php");
}
    
