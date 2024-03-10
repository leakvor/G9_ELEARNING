<?php
function getcourse_student($user_id, $course_id){
    global $connection;
    $statment=$connection->prepare("SELECT * FROM student_course WHERE user_id= :id AND course_id= :course_id");
    $statment->execute([':id'=>$user_id, ':course_id'=> $course_id]);

    return $statment->fetchAll();
}

function courseStudent($user_id, $course_id, $date){
    global $connection;
    $statment=$connection->prepare("INSERT INTO student_course(user_id, course_id, date) VALUES(:user_id, :course_id, :date)");
    $statment->execute([
        ':user_id'=>$user_id,
        ':course_id'=>$course_id,
        ':date'=>$date
    ]);
    
}
 
