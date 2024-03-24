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

// ======create message========
function message($user_id){
    global $connection;
    $statement = $connection->prepare("insert into messageapply (title,message,user_id) values (:title,:message,:user_id)");
    $statement->execute([
        ':title' => "Welcome to be a partner of us",
        ':message'=>"I am approve so you can teach in our website : You can create video (lesson) of each courses that you want to teach. Thank you :) Please log out from student account and login as a trainer",
        ':user_id'=>$user_id,

    ]);

    return $statement->rowCount() > 0;
}
// ======message not approve=======
function notApprovemessage($user_id){
    global $connection;
    $statement = $connection->prepare("insert into messageapply (title,message,user_id) values (:title,:message,:user_id)");
    $statement->execute([
        ':title' => "Sorry you can't join with use",
        ':message'=>"Please check your document that you give me before. I hope you can join with us soon. Thank you",
        ':user_id'=>$user_id,

    ]);

    return $statement->rowCount() > 0;
}

function getmessage(int $id): array
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM messageapply WHERE user_id = :id");
    $statement->execute([':id' => $id]);
    
    // Fetch the result as an associative array
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    if ($result) {
        return $result;  
    } else {
        return [];  
    }
}


// ======== alreay apply======
function alreadyApply( $user_id)
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM apply_totrainer WHERE user_id= :id");
    $statement->execute([':id' => $user_id]);
    return $statement->fetchAll();
}
