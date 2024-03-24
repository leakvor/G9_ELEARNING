<?php
require '../../database/database.php';
require '../../models/student.model.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['user_id'], $_POST['username'], $_POST['email'])) {
        $id = $_POST['user_id'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        
        // Check if image file is uploaded
        if(isset($_FILES['img'])) {
            $img_name = $_FILES['img']['name'];
            $img_size = $_FILES['img']['size'];
            $tmp_name = $_FILES['img']['tmp_name'];
            $error = $_FILES['img']['error'];

            if($error === 0){
                if($img_size > 12500000){
                    echo "<script>alert('Sorry, your file is too large.');</script>";
                } else {
                    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                    $img_ex_lc = strtolower($img_ex);
                    $allowed_exs = array("jpg", "jpeg", "png");
                    
                    if(in_array($img_ex_lc, $allowed_exs)){
                        $new_img_name = uniqid("", true).'.'.$img_ex_lc;
                        $img_upload_path = '../../assets/images/profile/'.$new_img_name;
                        if(move_uploaded_file($tmp_name, $img_upload_path)) {
                            $isupdate = updateStudentNoImg($username, $email, $new_img_name, $id);
                            if($isupdate){
                                header('Location: /updateprofile');
                                exit(); // Add exit() after redirection
                            } else {
                                echo "<script>alert('Error occurred while updating profile.');</script>";
                            }
                        } else {
                            echo "<script>alert('Error occurred while saving the file.');</script>";
                        }
                    } else {
                        echo "<script>alert('Only jpg, jpeg, and png files are allowed.');</script>";
                    }
                }
            } else {
                echo "<script>alert('Error occurred while uploading file.');</script>";
            }
        } 
    } else {
        echo "<script>alert('Please provide user ID, username, and email.');</script>";
    }
}


