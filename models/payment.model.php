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

if (!function_exists('isPaymentExist')) {
function isPaymentExist( int $userId,int $courseId): bool{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM payment WHERE course_id = :courseId AND user_id = :userId");
    $statement->execute([
        ':userId' => $userId,
        ':courseId' => $courseId
    ]);
    return $statement->rowCount()>0;
}}


function getTotalPaidToday() {
    global $connection; // Assuming $connection is your database connection

    $today = date('Y-m-d');
    $query = "SELECT SUM(paid) AS total_paid FROM payment WHERE DATE(date) = ?";
    $statement = $connection->prepare($query);
    $statement->execute([$today]);
    $result = $statement->fetch(PDO::FETCH_ASSOC);

    return $result['total_paid'] !== null ? $result['total_paid'] : 0; // Return total paid or default to 0
}

function getTotalPaidYesterday() {
    global $connection; // Assuming $connection is your database connection

    // Query to get total paid amount for yesterday
    $query = "SELECT IFNULL(SUM(paid), 0) AS total_paid_yesterday FROM payment WHERE DATE(date) = DATE_SUB(CURDATE(), INTERVAL 1 DAY)";
    $statement = $connection->prepare($query);
    $statement->execute();
    $result = $statement->fetch(PDO::FETCH_ASSOC);

    // Return total paid amount for yesterday
    return $result['total_paid_yesterday'];
}

function getTotalRevenueToday() {
    global $connection; // Assuming $connection is your database connection

    $today = date('Y-m-d');
    $query = "SELECT SUM(paid) AS total_revenue FROM payment WHERE DATE(date) = ?";
    $statement = $connection->prepare($query);
    $statement->execute([$today]);
    $result = $statement->fetch(PDO::FETCH_ASSOC);

    // Return total revenue or default to $0 if null
    return $result['total_revenue'] !== null ? $result['total_revenue'] : 0;
}

function getTotalPaidOverall() {
    global $connection; // Assuming $connection is your database connection

    $query = "SELECT SUM(paid) AS total_paid FROM payment";
    $statement = $connection->prepare($query);
    $statement->execute();
    $result = $statement->fetch(PDO::FETCH_ASSOC);

    // Return total paid or default to $0 if null
    return $result['total_paid'] !== null ? $result['total_paid'] : 0;
}



// Function to get total paid for this month
function getTotalPaidThisMonth() {
    global $connection; // Assuming $conn is your database connection object

    // Get the current month and year
    $currentMonth = date('m');
    $currentYear = date('Y');

    // Prepare and execute SQL query to get total paid for this month
    $query = "SELECT SUM(paid) AS total_paid FROM payment WHERE MONTH(date) = :month AND YEAR(date) = :year";
    $stmt = $connection->prepare($query);
    $stmt->execute(array(':month' => $currentMonth, ':year' => $currentYear));

    // Fetch the result
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Return the total paid for this month
    return $result['total_paid'];
}
function getPayment(): array
{
    global $connection;
    $statement = $connection->prepare("select * from payment");
    $statement->execute();
    return $statement->fetchAll();
}