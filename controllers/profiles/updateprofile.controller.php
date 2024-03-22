<?php
require '../../database/database.php';
require '../../models/student.model.php';
// session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if user_id email  and username are provided
    if(isset($_POST['user_id'], $_POST['username'],$_POST['email'],$_POST['img'])) {
        $id = $_POST['user_id'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $img=$_POST['img'];
        var_dump($username);
        var_dump($email);
        var_dump($img);
    
    if(empty($_FILES['img']['name'])){
        updateStudentNoImg($username,$email,$img,$id);
    }elseif(isset($_FILES['img'])){
        $img_name=$_FILES['img']['name'];
        $img_size=$_FILES['img']['size'];
        $tmp_name=$_FILES['img']['tmp_name'];
        $error=$_FILES['img']['error'];
        
        if($error===0){
            if($img_size > 12500000){
                echo "<script>alert('Sorry, your file is too large.');</script>";
            } else{
                $img_ex=pathinfo($img_name,PATHINFO_EXTENSION);
                $img_ex_lc=strtolower($img_ex);
                $allowed_exs=array("jpg","jpeg","png");
                if(in_array($img_ex_lc,$allowed_exs)){

                   $new_img_name = uniqid("", true).'.'.$img_ex_lc;
                   $img_upload_path = '../../assets/images/profile/'.$new_img_name;
                   move_uploaded_file($tmp_name, $img_upload_path);
                    $isupdate = updateStudentNoImg($username,$email,$new_img_name,$id);
                        
                        if($isupdate){
                            header('Location: /updateprofile');
                        } else {
                            echo "<script>alert('Error occurred while updating course.');</script>";
                        }
                    } else {
                        echo "<script>alert('Error occurred while uploading file.');</script>";
                    }
                }
            }
        } else {
            echo "<script>alert('Error occurred while uploading file.');</script>";

        }
    }
}


header('Location:  /updateprofile');