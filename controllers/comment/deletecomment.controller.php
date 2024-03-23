
<?php 
require "../../database/database.php";
require "../../models/comment.model.php";
if (isset($_GET['id']))
{
    $user_id=$_GET['user_id'];
    $id = $_GET['id'];
    deletecomment($id,$user_id);
}
header('Location: /myLessons');

?>