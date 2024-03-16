<?php
// Include database connection
require '../../database/database.php';

function studentChart($user_id, $course_id, $date)
{
    global $connection;
    $statement = $connection->prepare("INSERT INTO chart (course_id, user_id, date) VALUES (:course_id, :user_id, :date)");
    $statement->execute([
        ':user_id' => $user_id,
        ':course_id' => $course_id,
        ':date' => $date
    ]);
}

function getcourse_student($user_id, $course_id)
{
    global $connection;
    $statment = $connection->prepare("SELECT * FROM chart WHERE user_id= :id AND course_id= :course_id");
    $statment->execute([':id' => $user_id, ':course_id' => $course_id]);
    return $statment->fetchAll();
}

// Usage
$user_id = $_POST['user_id'];
$course_id = $_POST['course_id'];
$date = date('Y-m-d H:i:s');
$recordStuCou = getcourse_student($user_id, $course_id);

if (count($recordStuCou) > 0) {
    header('Location: /displayChart');
} else {
    studentChart($user_id, $course_id, $date);
    header('Location: /displayChart');
}



