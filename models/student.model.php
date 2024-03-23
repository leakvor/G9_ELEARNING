<?php

function createAcc(string $username, string $email, string $password) : bool
{
    global $connection;
    $statement = $connection->prepare("insert into users(username, email, password, role) values(:username, :email, :password, :role)");
    $statement->execute([
        ':username' => $username,
        ':email' => $email,
        ':password' => $password,
        ':role' => 'user',
    ]);
    return $statement->rowCount() > 0;
}

function accountExist(string $email): array
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM users WHERE email= :email");
    $statement->execute([
        ':email' => $email,
    ]);

    if ($statement->rowCount() > 0){
        return $results = $statement->fetch(PDO::FETCH_ASSOC);
    }else{
        return [];
    }
}
function profile(string $email, string $image)
{
    global $connection;
    $statement = $connection->prepare("UPDATE users SET img= :image WHERE email= :email");
    $statement->execute([
        ':image' => $image,
        ':email' => $email,
    ]);
    
    if ($statement->rowCount() > 0){
        return $results = $statement->fetch(PDO::FETCH_ASSOC);
    }else{
        return [];
    }
}
function getStudent() : array
{
    global $connection;
    $statement = $connection->prepare("select * from users where role = 'user' ");
    $statement->execute();
    return $statement->fetchAll();
}
function deleteStudent(int $id) :bool
{   
    global $connection;
    $statement = $connection->prepare("delete from users where user_id=:id");
    $statement->execute([':id' => $id]);
    $statement->fetchAll();
    return $statement->rowCount() > 0;
    
}

function updateStudent($username,$email,$password,$id,$img){
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

function updateStudentNoImg($username,$email,$id){
    global $connection;
    $statement= $connection->prepare("update users set username=:username,email =:email where user_id=:id");
    $statement->execute([
        ':id' => $id,
        ':username'=>$username,
        ':email' => $email,
    ]);
    $statement->rowCount() >0;
}




