<?php
if (!function_exists('getcourse_student')) {
    function getcourse_student($user_id, $course_id)
    {
        global $connection;
        $statement = $connection->prepare("SELECT * FROM student_course WHERE user_id= :id AND course_id= :course_id");
        $statement->execute([':id' => $user_id, ':course_id' => $course_id]);

        return $statement->fetchAll();
    }
}

if (!function_exists('courseStudent')) {
    function courseStudent($user_id, $course_id, $date)
    {
        global $connection;
        $statement = $connection->prepare("INSERT INTO student_course(user_id, course_id, date) VALUES(:user_id, :course_id, :date)");
        $statement->execute([
            ':user_id' => $user_id,
            ':course_id' => $course_id,
            ':date' => $date
        ]);
    }
}

if (!function_exists('myCourse')) {
    function myCourse($user_id)
    {
        global $connection;
        $statment = $connection->prepare("select course.course_id,course.title,course.course_img,course.user_id,course.paid from student_course inner join course on student_course.course_id=course.course_id
        inner join users on users.user_id=student_course.user_id where users.user_id=:id;");
        $statment->execute([':id' => $user_id]);

        return $statment->fetchAll();
    }
}


if (!function_exists('studentChart')) {
    function studentChart($user_id, $course_id, $date)
    {
        global $connection;
        $statment = $connection->prepare("INSERT INTO chart(course_id,user_id, date) VALUES(:course_id,:user_id, :date)");
        $statment->execute([
            ':user_id' => $user_id,
            ':course_id' => $course_id,
            ':date' => $date
        ]);
    }
}


if (!function_exists('myChart')) {
    function myChart(int $id): array
    {
        global $connection;
        $statement = $connection->prepare("select * from chart inner join course on course.course_id=chart.course_id where chart.user_id=:id;");
        $statement->execute([':id' => $id]);
        return $statement->fetchAll();
    }
}

if (!function_exists('deleteChart')) {
    function deleteChart($id)
    {
        global $connection;
        $statement = $connection->prepare("delete from chart where chart_id = :id");
        $statement->execute([':id' => $id]);
        return $statement->rowCount() > 0;
    }
}

if (!function_exists('totalAllcourse')) {
    function totalAllcourse($user_id)
    {
        global $connection;
        $statement = $connection->prepare("SELECT SUM(course.paid) as total_course_paid FROM chart INNER JOIN course ON course.course_id = chart.course_id WHERE chart.user_id = :id");
        $statement->execute([':id' => $user_id]);
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result['total_course_paid'];
    }
}

if (!function_exists('countLesson')) {
    function countLesson()
    {
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
}

if (!function_exists('showCourse')) {
    function showCourse($id)
    {
        global $connection;
        $statement = $connection->prepare("select * from course where course_id = :id");
        $statement->execute([':id' => $id]);
        return $statement->fetch();
    }
}

if (!function_exists('paymentCourse')) {
    function paymentCourse($user_id, $course_id, $paid, $date, $numberCard, $cvv, $nameCard)
    {
        global $connection;
        $statment = $connection->prepare("INSERT INTO payment(user_id,course_id,paid,date,numberofCard,cvv,nameonCard) VALUES(:user_id,:course_id,:paid, :date,:numberofCard,:cvv,:nameonCard)");
        $statment->execute([
            ':user_id' => $user_id,
            ':course_id' => $course_id,
            ':date' => $date,
            ':paid' => $paid,
            ':numberofCard' => $numberCard,
            ':cvv' => $cvv,
            ':nameonCard' => $nameCard
        ]);
        return $statment->rowCount() > 0;
    }
}

if (!function_exists('deleteChart')) {
    function deleteChart(int $id): bool
    {
        global $connection;
        $statement = $connection->prepare("delete from chart where chart_id=:id");
        $statement->execute([':id' => $id]);
        $statement->fetchAll();
        return $statement->rowCount() > 0;
    }
}


if (!function_exists('GetpayCourse')) {
    function GetpayCourse($user_id, $course_id)
    {
        global $connection;
        $statement = $connection->prepare("SELECT * FROM payment WHERE user_id= :id AND course_id= :course_id");
        $statement->execute([':id' => $user_id, ':course_id' => $course_id]);

        return $statement->fetchAll();
    }
}


if (!function_exists('isPaymentExist')){
    function isPaymentExist( int $userId,int $courseId): bool{
        global $connection;
        $statement = $connection->prepare("SELECT * FROM payment WHERE course_id = :courseId AND user_id = :userId");
        $statement->execute([
            ':userId' => $userId,
            ':courseId' => $courseId
        ]);
        return $statement->rowCount()>0;
    }
        
}
