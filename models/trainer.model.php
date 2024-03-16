<?php

function getTeacher() : array
{
    global $connection;
    $statement = $connection->prepare("select * from users where role='teacher'");
    $statement->execute();
    return $statement->fetchAll();
}
function createTrainer(string $username, string $email, string $password, string $img) : bool
{
    global $connection;
    $checkStatement = $connection->prepare("select count(*) from users where email = :email");
    $checkStatement->execute([':email' => $email]);
    $count = $checkStatement->fetchColumn();

    if ($count > 0) {
        return false;
    }

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

function updateTeacher($username,$email,$password,$id,$img){
    global $connection;
    $statement= $connection->prepare("update users set username=:username,email =:email,password =:password,img=:img where user_id=:id");
    $statement->execute([
        ':id' => $id,
        ':username'=>$username,
        ':email' => $email,
        ':password' => $password,
        ':img'=>$img,
    ]);
    $statement->rowCount() >0;
}

function updateTeacherNoImg($username,$email,$password,$id){
    global $connection;
    $statement= $connection->prepare("update users set username=:username,email =:email,password =:password where user_id=:id");
    $statement->execute([
        ':id' => $id,
        ':username'=>$username,
        ':email' => $email,
        ':password' => $password,
    ]);
    $statement->rowCount() >0;
}

function trainer_students($email) {
    // return $email;
    global $connection;
    $statement = $connection->prepare("SELECT * FROM course INNER JOIN users ON course.user_id = users.user_id WHERE email = :email");
    $statement->execute([":email" => $email]);
    
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

