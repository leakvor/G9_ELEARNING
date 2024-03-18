<?php
require '../../database/database.php';
require '../../models/student.model.php';
// session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if user_id email  and username are provided
    if(isset($_POST['user_id'], $_POST['username'])) {
        $id = $_POST['user_id'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        
        // Check if username email and id are not empty
        if($username !== '' && $email !=='' && $id!=='') {
            // Call the function in models
            updateStudentNoImg($username,$email,$id);
            // location updateprofile page
            header("Location: /updateprofile");
            exit(); 
            
        } else {
            // Handle if username or id is empty
            echo "Please provide both username and user ID.";
        }
    } else {
        // Handle if username or user ID is missing in POST data
        echo "Username or user ID is missing.";
    }
} else {
    // Handle other HTTP methods (GET, etc.) if needed
    echo "Invalid request method!";
}
