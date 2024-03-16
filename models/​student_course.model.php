<?php
if (!function_exists('getcourse_student')) {
    function getcourse_student($user_id, $course_id) {
        global $connection;
        $statement = $connection->prepare("SELECT * FROM student_course WHERE user_id= :id AND course_id= :course_id");
        $statement->execute([':id' => $user_id, ':course_id' => $course_id]);

        return $statement->fetchAll();
    }
}

if (!function_exists('courseStudent')) {
    function courseStudent($user_id, $course_id, $date) {
        global $connection;
        $statement = $connection->prepare("INSERT INTO student_course(user_id, course_id, date) VALUES(:user_id, :course_id, :date)");
        $statement->execute([
            ':user_id' => $user_id,
            ':course_id' => $course_id,
            ':date' => $date
        ]);
    }
}
 
// function studentChart($user_id, $course_id, $date){
//     global $connection;
//     $statment=$connection->prepare("INSERT INTO chart(course_id,user_id, date) VALUES(:course_id,:user_id, :date)");
//     $statment->execute([
//         ':user_id'=>$user_id,
//         ':course_id'=>$course_id,
//         ':date'=>$date
//     ]);
    
// }

if (!function_exists('myChart')) {
    function myChart(int $id) : array {
        global $connection;
        $statement = $connection->prepare("select * from chart inner join course on course.course_id=chart.course_id where chart.user_id=:id;");
        $statement->execute([':id' => $id]);
        return $statement->fetchAll();
    }
}

if (!function_exists('deleteChart')) {
    function deleteChart($id) {
        global $connection;
        $statement = $connection->prepare("delete from chart where chart_id = :id");
        $statement->execute([':id' => $id]);
        return $statement->rowCount() > 0;
    }
}

if (!function_exists('totalAllcourse')) {
    function totalAllcourse($user_id){
        global $connection;
        $statement = $connection->prepare("SELECT SUM(course.paid) as total_course_paid FROM chart INNER JOIN course ON course.course_id = chart.course_id WHERE chart.user_id = :id");
        $statement->execute([':id' => $user_id]);
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result['total_course_paid'];
    }
}