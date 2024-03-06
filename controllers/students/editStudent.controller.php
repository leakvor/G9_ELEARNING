<?php
require "../../database/database.php";
require "../../models/student.model.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $id = htmlspecialchars($_POST['id']);
    var_dump($_POST);
    var_dump($_FILES);
    if(empty($_FILES['img']['name'])){
        updateStudentNoImg($username, $email, $password, $id);
        // header("location: /studentEditprofile");
    }elseif(isset($_FILES['img'])){
        $img_name=$_FILES['img']['name'];
        $img_size=$_FILES['img']['size'];
        $tmp_name=$_FILES['img']['tmp_name'];
        $error=$_FILES['img']['error'];
        
        if($error===0){
            if($img_size > 125000000){
                echo "<script>alert('Sorry, your file is too large.');</script>";
            } else {
                $img_ex=pathinfo($img_name,PATHINFO_EXTENSION);
                $img_ex_lc=strtolower($img_ex);
                $allowed_exs=array("jpg","jpeg","png");
                
                if(in_array($img_ex_lc,$allowed_exs)){
                    $new_img_name = uniqid("", true).'.'.$img_ex_lc;
                    $img_upload_path = "../../assets/images/profile/".$new_img_name;
                    
                    if(move_uploaded_file($tmp_name, $img_upload_path)){
                        $isCreate = updateStudent($username, $email, $password, $id, $new_img_name);
                        
                        if($isCreate){
                            header("Location: /studentEditprofile");
                        } else {
                            echo "<script>alert('Error occurred while updating student.');</script>";
                        }
                    } else {
                        echo "<script>alert('Error occurred while uploading file.');</script>";
                    }
                } else {
                    echo "<script>alert('Sorry, only JPG, JPEG, and PNG files are allowed.');</script>";
                }
            }
        } else {
            echo "<script>alert('Error occurred while uploading file.');</script>";

        }
    }
}
// header("Location: /studentEditprofile");
?>