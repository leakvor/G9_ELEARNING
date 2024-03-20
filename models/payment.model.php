<?php
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

function isPaymentExist(int $userId, int $courseId): bool
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM payment WHERE course_id = :courseId AND user_id = :userId");
    $statement->execute([
        ':userId' => $userId,
        ':courseId' => $courseId
    ]);
    return $statement->rowCount() > 0;
}
function getPayment(): array
{
    global $connection;
    $statement = $connection->prepare("select * from payment");
    $statement->execute();
    return $statement->fetchAll();
}
