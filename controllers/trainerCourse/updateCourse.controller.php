<?php
require '../../database/database.php';
require '../../models/course.model.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $course= htmlspecialchars($_POST['title']);
    $id = ($_POST['id']);
    
    if(isset($_FILES['image'])){
        $img_name=$_FILES['image']['name'];
        $img_size=$_FILES['image']['size'];
        $tmp_name=$_FILES['image']['tmp_name'];
        $error=$_FILES['image']['error'];
        
        if($error===0){
            if($img_size > 12500000){
                echo "<script>alert('Sorry, your file is too large.');</script>";
            } else {
                $img_ex=pathinfo($img_name,PATHINFO_EXTENSION);
                $img_ex_lc=strtolower($img_ex);
                $allowed_exs=array("jpg","jpeg","png");
                
                if(in_array($img_ex_lc,$allowed_exs)){
                    $new_img_name = uniqid("", true).'.'.$img_ex_lc;
                    $img_upload_path = '../../assets/images/category/'.$new_img_name;
                    
                    if(move_uploaded_file($tmp_name, $img_upload_path)){
                        $isCreate = updateCourse($category, $new_img_name,$id,);
                        
                        if($isCreate){
                            // Redirect or perform further actions
                            header('Location:  /trainerdashboard');
                        } else {
                            echo "<script>alert('Error occurred while updating course.');</script>";
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

