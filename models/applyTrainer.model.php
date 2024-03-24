<?php
// ==========table apply===========
function getDataApply(){
    global $connection;
    $statement = $connection->prepare("select * from apply_totrainer");
    $statement->execute();
    return $statement->fetchAll();
}


function deleteApply(int $id) : bool
{
    global $connection;
    $statement = $connection->prepare("delete from apply_totrainer where apply_id = :id");
    $statement->execute([':id' => $id]);
    return $statement->rowCount() > 0;
}

function createApply($name,$email,$password,$document,$user_id) : bool
{
    global $connection;
    $statement = $connection->prepare("insert into apply_totrainer (name,email,password,document_apply,user_id) values (:name, :email,:password,:document,:user_id)");
    $statement->execute([
        ':name' => $name,
        ':email' => $email,
        ':password'=>$password,
        ':document'=>$document,
        ':user_id'=>$user_id,

    ]);

    return $statement->rowCount() > 0;
}

function getApplyId(int $id) : array
{
    global $connection;
    $statement = $connection->prepare("select * from apply_totrainer where apply_id = :id");
    $statement->execute([':id' => $id]);
    return $statement->fetch();
}


function message($email,$password,$user_id){
    global $connection;
    $statement = $connection->prepare("insert into messageapply (title,email,password,message,user_id) values (:title, :email,:password,:message,:user_id)");
    $statement->execute([
        ':title' => "Welcome to be a partner of us",
        ':email' => $email,
        ':password'=>$password,
        ':message'=>"I am approve so you can teach in our website : You can create video (lesson) of each courses that you want to teach. Moreover you can sigin as a trainer , but you must sign out from student account first and you don't have license to update profile",
        ':user_id'=>$user_id,

    ]);

    return $statement->rowCount() > 0;
}