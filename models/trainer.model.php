<?php
function getTeacher(): array
{
    global $connection;
    $statement = $connection->prepare("select * from users where role='teacher'");
    $statement->execute();
    return $statement->fetchAll();
}

function createTrainer(string $username, string $email, string $password, string $img): bool
{
    global $connection;
    // $checkStatement = $connection->prepare("select count(*) from users where email = :email");
    // $checkStatement->execute([':email' => $email]);
    // $count = $checkStatement->fetchColumn();
    // if ($count > 0) {
    //     return false;
    // }

    $statement = $connection->prepare("insert into users (username, email, password, role, img) values (:username, :email, :password, :role, :img)");
    $result = $statement->execute([
        ':username' => $username,
        ':email' => $email,
        ':password' => $password,
        ':role' => "teacher",
        ':img' => $img,
    ]);
    return $result;
}


function deleteTeacher(int $id): bool
{
    global $connection;
    $statement = $connection->prepare("delete from users where user_id = :user_id");
    $statement->execute([':user_id' => $id]);
    return $statement->rowCount() > 0;
}

function updateTeacher($username, $email, $password, $id, $img)
{
    global $connection;
    $statement = $connection->prepare("update users set username=:username,email =:email,password =:password,img=:img where user_id=:id");
    $statement->execute([
        ':id' => $id,
        ':username' => $username,
        ':email' => $email,
        ':password' => $password,
        ':img' => $img,
    ]);
    $statement->rowCount() > 0;
}

function updateTeacherNoImg($username, $email, $password, $id)
{
    global $connection;
    $statement = $connection->prepare("update users set username=:username,email =:email,password =:password where user_id=:id");
    $statement->execute([
        ':id' => $id,
        ':username' => $username,
        ':email' => $email,
        ':password' => $password,
    ]);
    $statement->rowCount() > 0;
}

function trainer_students($email)
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM course INNER JOIN users ON course.user_id = users.user_id WHERE email = :email");
    $statement->execute([":email" => $email]);
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}


function displayStudent($id)
{
    global $connection;
    $statment = $connection->prepare("select users.username,users.img, users.email,course.user_id,student_course.date from student_course
        inner join users on users.user_id=student_course.user_id
       inner join course on course.course_id=student_course.course_id where course.user_id=:id and role='user'");
    $statment->execute([':id' => $id]);

    return $statment->fetchAll();
}


function countCoursesPerStudent($id)
{
    global $connection;
    try {
        $statement = $connection->prepare("SELECT users.user_id, users.username,users.img,users.email,student_course.date, COUNT(course.course_id) AS course_count 
            FROM users 
            LEFT JOIN student_course ON users.user_id = student_course.user_id 
            LEFT JOIN course ON course.course_id = student_course.course_id 
            WHERE course.user_id = :id AND users.role = 'user' 
            GROUP BY users.user_id");
        $statement->execute([':id' => $id]);
        $courseCounts = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $courseCounts;
    } catch (PDOException $e) {
        // Handle database errors here
        echo "Error: " . $e->getMessage();
        return []; // Return an empty array or handle the error as per your application's logic
    }
}

function trainer_Profile($id)
{
    global $connection;
    $statement = $connection->prepare("SELECT * from users where user_id=:id");
    $statement->execute([":id" => $id]);
    $result = $statement->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function myStudent($id){
    global $connection;
    $statment = $connection->prepare("select * from student_course inner join users on users.user_id=student_course.user_id where users.user_id=:id");
    $statment->execute([':id' => $id]);

    return $statment->fetchAll();
}

function updateRole($id)
{
    global $connection;
    $statement = $connection->prepare("update users set role=:role where user_id=:id");
    $statement->execute([
        ':role' => "teacher",
        ':id'=>$id
        
    ]);
    $statement->rowCount() > 0;
}
