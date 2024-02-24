<?php
require('../../database/database.php');
require('../../models/trainer.model.php');

function sanitize_input($data) {
    return htmlspecialchars(trim($data));
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username = sanitize_input($_POST['username']);
    $email = sanitize_input($_POST['email']);
    $password = sanitize_input($_POST['password']);
    $id = sanitize_input($_POST['id']);
    if(empty($_POST['file'])){
        updateTeacherNoImg($username, $email, $password, $id);
    }
    if (!empty($username) && !empty($email) && !empty($password)) {
        if (isset($_FILES['img'])) {
            $img_name = $_FILES['img']['name'];
            $img_size = $_FILES['img']['size'];
            $tmp_name = $_FILES['img']['tmp_name'];
            $error = $_FILES['img']['error'];

            if ($error === UPLOAD_ERR_OK) {
                if ($img_size > 500000) {
                    echo "<script>alert('Sorry, your file is too large.');</script>";
                } else {
                    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                    $allowed_exs = array("jpg", "jpeg", "png");
                    if (in_array($img_ex, $allowed_exs)) {
                        $new_img_name = uniqid("", true) . '.' . $img_ex;
                        $img_upload_path = 'assets/images/instructor/' . $new_img_name;
                        if (move_uploaded_file($tmp_name, $img_upload_path)) {
                            $isCreate = updateTeacher($username, $email, $password, $id, $new_img_name);
                        } else {
                            echo "<script>alert('An error occurred while uploading the file.');</script>";
                        }
                    } else {
                        echo "<script>alert('Sorry, only JPG, JPEG, and PNG files are allowed.');</script>";
                    }
                }
            } else {
                echo "<script>alert('An error occurred during file upload.');</script>";
            }
        }
    } else {
        echo "<script>alert('Please fill in all required fields.');</script>";
    }
}

$teachers = getTeacher();
header("Location: /adminTrainer");
require "../../views/trainers/adminTrainer.view.php";

