<?php

function notifi(): array {
    // Prepare SQL query
    global $connection;
    $query = "
    SELECT u.username AS student_username, c.title AS course_title, u2.username AS teacher_name
    FROM payment sc
    JOIN users u ON sc.user_id = u.user_id
    JOIN course c ON sc.course_id = c.course_id
    JOIN users u2 ON c.user_id = u2.user_id
    JOIN payment p ON p.course_id = c.course_id 
    WHERE u2.role = 'teacher'
    ";
    
    // Prepare the statement
    $statement = $connection->prepare($query);
    
    // Execute the statement
    $statement->execute();
    
    // Fetch all rows as an associative array
    $notifications = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    // Return the result
    return $notifications;
}

function updateStatus() : bool
{
    global $connection;
    $statement = $connection->prepare("UPDATE `payment` SET `status` = 'false';
    ");
    $statement->execute();

    return $statement->rowCount() > 0;
}


