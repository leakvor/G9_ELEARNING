<?php
require "../../database/database.php";
require "../../models/​student_course.model.php";
require "../../models/lesson.model.php";




session_start();
$cardNameMsg = $cardNumberMsg = $expDateMsg = $cvvMsg = $exitAcc = '';
$oldCardName = $oldCardNumber = $oldExpDate = $oldCvv = '';
$isValidForm = true;
$_SESSION['cardName'] = '';
$_SESSION['cardNumber'] = '';
$_SESSION['cardCvv'] = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $myLesson = displayAlllesson($_POST['course_id']);
    $pay = GetpayCourse($_POST['user_id'], $_POST['course_id']);
    $recordStuCou = getcourse_student($_POST['user_id'], $_POST['course_id']);
    if (isset($_POST['nameCard'])) {
        $oldCardName = $_POST['nameCard'];
        if (strlen($_POST['nameCard']) < 5) {
            $cardNameMsg = "Invalid card name";
            $_SESSION['cardName'] = $cardNameMsg;
            $isValidForm = false;
            
        }
    }

    if (isset($_POST['numberCard'])) {
        $oldCardNumber = $_POST['numberCard'];
        if (!validateCreditCard($_POST['numberCard'])) {
            $cardNumberMsg = "Invalid card number";
            $_SESSION['cardNumber'] = $cardNumberMsg;
            $isValidForm = false;
            
        }
    }

    if (isset($_POST['cvv'])) {
        $oldCvv = $_POST['cvv'];
        if (strlen($_POST['cvv']) !== 3) {
            $cvvMsg = "Invalid CVV number";
            $_SESSION['cardCvv'] = $cvvMsg;
            $isValidForm = false;
            
        }
    }
    if ($isValidForm) {
        if (count($pay) > 0 && count($recordStuCou)>0) {
            $myLesson = displayAlllesson($_POST['course_id']);
            $_SESSION['id'] = $_POST['course_id'];
            header("Location: /myLessons");
        } else {
            $myLesson = displayAlllesson($_POST['course_id']);
            $isCreate = paymentCourse($_POST['user_id'], $_POST['course_id'], $_POST['paid'], $_POST['date'], $_POST['numberCard'], $_POST['cvv'], $_POST['nameCard']);
            courseStudent($_POST['user_id'], $_POST['course_id'], $_POST['date']);
            $_SESSION['id'] = $_POST['course_id'];
            header("Location: /myLessons");
        }
    }else{
        header("Location: /payForCourse");
    }
}

function validateCreditCard($creditCardNumber)
{
    // Remove any spaces or non-numeric characters from the credit card number 
    $cleanedNumber = preg_replace('/\D/', '', $creditCardNumber);

    // Check if the credit card number is exactly 16 digits 
    if (strlen($cleanedNumber) !== 16) {
        return false;
    }

    // Reverse the credit card number 
    $reversedNumber = strrev($cleanedNumber);

    // Initialize variables for the  algorithm calculation 
    $sum = 0;
    $double = false;

    // Loop through each digit of the reversed credit card number 
    for ($i = 0; $i < strlen($reversedNumber); $i++) {
        $digit = intval($reversedNumber[$i]);

        // Double every second digit starting from the right (from index 0) 
        if ($double) {
            $digit *= 2;
            // If the doubled digit is greater than 9, subtract 9 from it 
            if ($digit > 9) {
                $digit -= 9;
            }
        }

        // Add the digit to the sum 
        $sum += $digit;

        // Toggle the 'double' flag for the next iteration 
        $double = !$double;
    }

    // If the sum is divisible by 10, the credit card number is valid 
    return $sum % 10 === 0;
}
