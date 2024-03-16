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
 
function studentChart($user_id, $course_id, $date){
    global $connection;
    $statment=$connection->prepare("INSERT INTO chart(course_id,user_id, date) VALUES(:course_id,:user_id, :date)");
    $statment->execute([
        ':user_id'=>$user_id,
        ':course_id'=>$course_id,
        ':date'=>$date
    ]);
    
}

function myChart(int $id) : array
{
    global $connection;
    $statement = $connection->prepare("select * from chart inner join course on course.course_id=chart.course_id where chart.user_id=:id;");
    $statement->execute([':id' => $id]);
    return $statement->fetchAll();
}

function deleteChart($id){
    global $connection;
    $statement = $connection->prepare("delete from chart where chart_id = :id");
    $statement->execute([':id' => $id]);
    return $statement->rowCount() > 0;
}