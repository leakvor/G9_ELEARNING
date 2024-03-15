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


function myCourse($user_id){
    global $connection;
    $statment=$connection->prepare("select course.course_id,course.title,course.course_img,course.user_id,course.paid from student_course inner join course on student_course.course_id=course.course_id
    inner join users on users.user_id=student_course.user_id where users.user_id=:id;");
    $statment->execute([':id'=>$user_id]);

    return $statment->fetchAll();
}
 
function countLesson() {
    global $connection;
    $statement = $connection->prepare("SELECT course_id, COUNT(*) AS count FROM lessons GROUP BY course_id");
    $statement->execute();
    $lessonCounts = $statement->fetchAll(PDO::FETCH_ASSOC);

    $courseLessonCount = [];
    foreach ($lessonCounts as $lessonCount) {
        $courseLessonCount[$lessonCount['course_id']] = $lessonCount['count'];
    }

    return $courseLessonCount;
}


