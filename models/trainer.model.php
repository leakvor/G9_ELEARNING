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
    $statement = $connection->prepare("insert into users (username,email,password,role,img) values (:username, :email,:password,:role,:img)");
    $statement->execute([
        ':username'=>$username,
        ':email'=>$email,
        ':password'=>$password,
        ':role'=>"teacher",
        ':img'=>$img,

    ]);

    return $statement->rowCount() > 0;
}


function deleteTeacher(int $id): bool
{
    global $connection;
    $statement = $connection->prepare("delete from users where user_id = :user_id");
    $statement->execute([':user_id' => $id]);
    return $statement->rowCount() > 0;
}

function editTeacher($username,$email,$password,$id){
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

