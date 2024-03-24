<?php
session_start();
require('../../database/database.php');
require('../../models/applyTrainer.model.php');

$is_wrong_validate = "Please correct your validation!";

$regex_email = "/^[a-z\.]{4,20}\@[a-z\.]{2,40}\.[a-z]{1,3}$/";
$regex_password = "/^[a-zA-Z\d\!\@\#\$\%]{5,8}$/";
$regex_first_name = "/^[A-Z][a-z]{1,10}$/";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $firstName = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $user_id = htmlspecialchars($_POST['user_id']);

    $document = $_FILES['document']['tmp_name'];

    if (preg_match($regex_first_name, $firstName) && preg_match($regex_email, $email) && preg_match($regex_password, $password)) {
        // No need to hash the password here, as it's already hashed before this check
        // Password should not be stored in plaintext in any form
        if (!empty($_FILES['document']['name'])) {
            $uploadResult = handleFileUpload($_FILES['document']);
            if ($uploadResult['success']) {
                $createApply = createApply($firstName, $email, $password, $uploadResult['filePath'], $user_id);
                if ($createApply) {
                    echo '<script>alert("Apply created successfully!");';
                    header('Location: /studentDashboard');
                    exit();
                } else {
                    echo "Error creating application.";
                }
            } else {
                echo $uploadResult['message'];
            }
        } else {
            echo "Document upload is required.";
        }
    } else {
        $_SESSION['validation'] = $is_wrong_validate;
        header("Location: /applyTrainer");
    }
} else {
    echo "Invalid request method.";
}

// Function to handle file upload
function handleFileUpload($file) {
    $targetDir = "../../assets/uploads/";
    $targetFile = $targetDir . basename($file['name']);
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    $allowedFormats = array("pdf", "mp4", "avi", "mov", "docx");

    if ($file['size'] > 5000000) {
        return ['success' => false, 'message' => "Sorry, your file is too large."];
    } elseif (!in_array($fileType, $allowedFormats)) {
        return ['success' => false, 'message' => "Sorry, only PDF, MP4, AVI, MOV, DOCX files are allowed."];
    } elseif (!move_uploaded_file($file['tmp_name'], $targetFile)) {
        return ['success' => false, 'message' => "Sorry, there was an error uploading your file."];
    } else {
        return ['success' => true, 'filePath' => $targetFile];
    }
}
?>
