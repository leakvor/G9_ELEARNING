<?php

function createPost(string $title, string $description) : bool
{
    global $connection;
    $statement = $connection->prepare("insert into posts (title, description) values (:title, :description)");
    $statement->execute([
        ':title' => $title,
        ':description' => $description

    ]);

    return $statement->rowCount() > 0;
}

function getPost(int $id) : array
{
    global $connection;
    $statement = $connection->prepare("select * from posts where id = :id");
    $statement->execute([':id' => $id]);
    return $statement->fetch();
}

function getPosts() : array
{
    global $connection;
    $statement = $connection->prepare("select * from posts");
    $statement->execute();
    return $statement->fetchAll();
}

function updatePost(string $title, string $description, int $id) : bool
{
    global $connection;
    $statement = $connection->prepare("update posts set title = :title, description = :description where id = :id");
    $statement->execute([
        ':title' => $title,
        ':description' => $description,
        ':id' => $id

    ]);

    return $statement->rowCount() > 0;
}

function deletePost(int $id) : bool
{
    global $connection;
    $statement = $connection->prepare("delete from posts where id = :id");
    $statement->execute([':id' => $id]);
    return $statement->rowCount() > 0;
}

// _________________senrin-code-function_____________________

function accountExist(string $email): array
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM users WHERE email = :email");
    $statement->execute([
        ':email' => $email,
    ]);

    if ($statement->rowCount() > 0){
        return $results = $statement->fetch(PDO::FETCH_ASSOC);
    }else{
        return [];
    }
}


function getPaetToday(): array {
    global $connection;
    $statement = $connection->prepare("SELECT DATE(date) AS payment_day, SUM(paid) AS total_paid
    FROM payment
    GROUP BY DATE(date);");
    
    $statement->execute();
    
    return $results = $statement->fetchAll(PDO::FETCH_ASSOC);
}


function getPaymentData(): array {
    global $connection;
    $statement = $connection->prepare("
        SELECT u.username, c.title, p.date, p.paid
        FROM payment p
        INNER JOIN users u ON p.user_id = u.user_id
        INNER JOIN course c ON p.course_id = c.course_id
    ");
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}


function getCourseUserData(): array {
    global $connection;
    $statement = $connection->prepare("
        SELECT c.title AS course_title, COUNT(u.username) AS user_count
        FROM student_course sc
        JOIN course c ON sc.course_id = c.course_id
        JOIN users u ON sc.user_id = u.user_id
        GROUP BY c.title;
    ");
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}
