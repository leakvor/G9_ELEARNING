<?php
session_start();
require('../../database/database.php');
require('../../models/applyTrainer.model.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $firstName = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $user_id = htmlspecialchars($_POST['user_id']);
    if (!empty($_FILES['document']['name'])) {
        $uploadResult = handleFileUpload($_FILES['document']);
        if ($uploadResult['success']) {
            if (!alreadyApply( $user_id)) {
                $createApply = createApply($firstName, $email, $password, $uploadResult['filePath'], $user_id);
                if ($createApply) {
                    echo '<script>alert("Apply created successfully!");</script>';
                    header('Location: /studentDashboard');
                    exit();
                } else {
                    echo "Error creating application.";
                }
            } else {
                echo "An application with similar details already exists.";
                header("Location: /applyTrainer");
            }
        } else {
            echo $uploadResult['message'];
        }
    } else {
        echo "Document upload is required.";
    }
} else {
    header("Location: /applyTrainer");
}

function handleFileUpload($file)
{
    $targetDir = "../../assets/uploads/";
    $targetFile = $targetDir . basename($file['name']);
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    $allowedFormats = array("pdf", "mp4", "avi", "mov", "docx");

    if ($file['size'] > 5000000) {
        $_SESSION['validate']="Please checkout you validate we get only pdf,docx,mp4,avi, and mov";
        header("Location: /applyTrainer");  
    } elseif (!in_array($fileType, $allowedFormats)) {
        $_SESSION['validate']="Please checkout you validate we get only pdf,docx,mp4,avi, and mov";
        header("Location: /applyTrainer");  
    } elseif (!move_uploaded_file($file['tmp_name'], $targetFile)) {
        $_SESSION['validate']="Please checkout you validate we get only pdf,docx,mp4,avi, and mov";
        header("Location: /applyTrainer");
    } else {
        return ['success' => true, 'filePath' => $targetFile];
    }
}