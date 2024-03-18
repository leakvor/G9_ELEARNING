<?php
// Include database connection
require '../../database/database.php';

function studentChart($user_id, $course_id, $date)
{
    global $connection;
    $statement = $connection->prepare("INSERT INTO chart ( user_id,course_id, date) VALUES ( :user_id, :course_id,:date)");
    $statement->execute([
        ':user_id' => $user_id,
        ':course_id' => $course_id,
        ':date' => $date
    ]);
}

function getchart_student($user_id, $course_id)
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
$recordStuCou = getchart_student($user_id, $course_id);

if (count($recordStuCou) > 0) {
    header('Location: /');
} else {
    studentChart($user_id, $course_id, $date);
    header('Location: /');
}



