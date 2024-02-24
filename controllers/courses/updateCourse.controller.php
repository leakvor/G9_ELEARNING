<?php
require "../../database/database.php";
require "../../models/course.model.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = htmlspecialchars($_POST['title']);
    $id = ($_POST['id']);
    $teacher = htmlspecialchars($_POST['teacher']);
    $category = htmlspecialchars($_POST['category']);
    $paid = htmlspecialchars($_POST['paid']);
    if(empty($_POST['file'])){
        updateCourseNotImge($id, $title, $teacher, $category,$paid);
        header('Location: /adminCourse');
    }elseif(isset($_FILES['img'])){
        $img_name=$_FILES['img']['name'];
        $img_size=$_FILES['img']['size'];
        $tmp_name=$_FILES['img']['tmp_name'];
        $error=$_FILES['img']['error'];
        
        if($error===0){
            if($img_size > 125000){
                echo "<script>alert('Sorry, your file is too large.');</script>";
            } else {
                $img_ex=pathinfo($img_name,PATHINFO_EXTENSION);
                $img_ex_lc=strtolower($img_ex);
                $allowed_exs=array("jpg","jpeg","png");
                
                if(in_array($img_ex_lc,$allowed_exs)){
                    $new_img_name = uniqid("", true).'.'.$img_ex_lc;
                    $img_upload_path = '../../assets/images/course/'.$new_img_name;
                    
                    if(move_uploaded_file($tmp_name, $img_upload_path)){
                        $isCreate = updateCourse($id, $title, $teacher, $category, $new_img_name,$paid);
                        
                        if($isCreate){
                            // Redirect or perform further actions
                            header('Location: /adminCourse');
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
?>