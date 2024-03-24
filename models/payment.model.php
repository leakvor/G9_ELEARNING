<?php
// ======create payment=======
if (!function_exists('paymentCourse')) {
    function paymentCourse($user_id, $course_id, $paid, $date, $numberCard, $cvv, $nameCard)
    {
        global $connection;
        $statment = $connection->prepare("INSERT INTO payment(user_id,course_id,paid,date,numberofCard,cvv,nameonCard,status) VALUES(:user_id,:course_id,:paid, :date,:numberofCard,:cvv,:nameonCard,:status)");
        $statment->execute([
            ':user_id' => $user_id,
            ':course_id' => $course_id,
            ':date' => $date,
            ':paid' => $paid,
            ':numberofCard' => $numberCard,
            ':cvv' => $cvv,
            ':nameonCard' => $nameCard,
            ':status'=>true,
        ]);
        return $statment->rowCount() > 0;
    }
}

// =====Already pay(admin)=======
if (!function_exists('isPaymentExist')) {
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
}


if (!function_exists('getTotalPaidToday')) {
function getTotalPaidToday()
{
    global $connection;
    $today = date('Y-m-d');
    $query = "SELECT SUM(paid) AS total_paid FROM payment WHERE DATE(date) = ?";
    $statement = $connection->prepare($query);
    $statement->execute([$today]);
    $result = $statement->fetch(PDO::FETCH_ASSOC);
    return $result['total_paid'] !== null ? $result['total_paid'] : 0;
}}



if (!function_exists('getTotalPaidYesterday')) {
function getTotalPaidYesterday()
{
    global $connection;
    $query = "SELECT IFNULL(SUM(paid), 0) AS total_paid_yesterday FROM payment WHERE DATE(date) = DATE_SUB(CURDATE(), INTERVAL 1 DAY)";
    $statement = $connection->prepare($query);
    $statement->execute();
    $result = $statement->fetch(PDO::FETCH_ASSOC);
    return $result['total_paid_yesterday'];
}}

if (!function_exists('getTotalRevenueToday')) {
function getTotalRevenueToday()
{
    global $connection;
    $today = date('Y-m-d');
    $query = "SELECT SUM(paid) AS total_revenue FROM payment WHERE DATE(date) = ?";
    $statement = $connection->prepare($query);
    $statement->execute([$today]);
    $result = $statement->fetch(PDO::FETCH_ASSOC);
    return $result['total_revenue'] !== null ? $result['total_revenue'] : 0;
}}


if (!function_exists('getTotalPaidOverall')) {
function getTotalPaidOverall()
{
    global $connection;
    $query = "SELECT SUM(paid) AS total_paid FROM payment";
    $statement = $connection->prepare($query);
    $statement->execute();
    $result = $statement->fetch(PDO::FETCH_ASSOC);
    return $result['total_paid'] !== null ? $result['total_paid'] : 0;
}
}

if (!function_exists('getTotalPaidThisMonth')) {
function getTotalPaidThisMonth()
{
    global $connection;
    $currentMonth = date('m');
    $currentYear = date('Y');

    $query = "SELECT SUM(paid) AS total_paid FROM payment WHERE MONTH(date) = :month AND YEAR(date) = :year";
    $stmt = $connection->prepare($query);
    $stmt->execute(array(':month' => $currentMonth, ':year' => $currentYear));
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result['total_paid'];
}}
// =====Total paid today for trainer=====
if (!function_exists('totalTodayTrainer')) {
function totalTodayTrainer($id)
{
    global $connection;
    $statement = $connection->prepare("SELECT SUM(payment.paid) AS total_paid_today
                    FROM payment
                    INNER JOIN course ON payment.course_id = course.course_id
                    WHERE course.user_id = :id
                      AND DATE(payment.date) = CURDATE()");
    $statement->execute([':id' => $id]);
    return $statement->fetch();  
}}

// =====Total paid this months for trainer=====
if (!function_exists('totalthisMonthTrainer')) {
function totalthisMonthTrainer($id)
{
    global $connection;
    $statement = $connection->prepare("SELECT SUM(payment.paid) AS total_paid_month
    FROM payment
    INNER JOIN course ON payment.course_id = course.course_id
    WHERE course.user_id = :id
      AND MONTH(payment.date) = MONTH(CURDATE())
      AND YEAR(payment.date) = YEAR(CURDATE())");
    $statement->execute([':id' => $id]);
    return $statement->fetch();  
}}
// =====Total paid all for trainer=====
if (!function_exists('totalAll')) {
function totalAll($id)
{
    global $connection;
    $statement = $connection->prepare("SELECT SUM(payment.paid) AS total_paid_all
    FROM payment
    INNER JOIN course ON payment.course_id = course.course_id
    WHERE course.user_id =:id");
    $statement->execute([':id' => $id]);
    return $statement->fetch();  
}}

// =======selling course of trainer==========
if (!function_exists('sellingCourse')) {
function sellingCourse($id): array {
    global $connection;
    $statement = $connection->prepare("
    SELECT c.course_id, c.title, c.course_img, c.paid, c.user_id, c.cate_id, COUNT(DISTINCT sc.user_id) AS student_count
    FROM course c
    LEFT JOIN student_course sc ON c.course_id = sc.course_id
    WHERE c.user_id = :id
    GROUP BY c.course_id
    ORDER BY student_count DESC, c.course_id ASC;
    ");
    $statement->execute([':id' => $id]);
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}}

// ====get all data in payment======
if (!function_exists('getPayment')) {
function getPayment(): array
{
    global $connection;
    $statement = $connection->prepare("select * from payment");
    $statement->execute();
    return $statement->fetchAll();
}}

// ======get total paid for each student======
if (!function_exists('totalTodayStudent')) {
    function totalTodayStudent($id)
    {
        global $connection;
        $statement = $connection->prepare("SELECT user_id, SUM(paid) AS total_paid_today, CURDATE() AS date
        FROM payment
        WHERE user_id = :id AND DATE(date) = CURDATE()
        GROUP BY user_id");
        $statement->execute([':id' => $id]);
        
        // Check if there are any results
        $result = $statement->fetch();
        if (!$result) {
            return ['user_id' => $id, 'total_paid_today' => 0, 'date' => date('Y-m-d')];
        }

        return $result;
    }
}


// =============student totalAll===========
    if (!function_exists('totalAllpaidStudent')) {
        function totalAllpaidStudent($id)
        {
            global $connection;
            $statement = $connection->prepare("select user_id,course_id, SUM(paid) as total_paid,date from payment where user_id=:id");
            $statement->execute([':id' => $id]);
            return $statement->fetch();  
        }}


        
// ====total student course===========
if (!function_exists('totalCourse')) {
function totalCourse($id)
{
    global $connection;
    $statement = $connection->prepare(" select count(course_id) as total_course from student_course where user_id=:id");
    $statement->execute([':id' => $id]);
    return $statement->fetch();  
}}