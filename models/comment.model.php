<?php


    function displayAllcomment($id)
    {
        global $connection;
        $statement = $connection->prepare(" select comment_id,title,img,username,date,course_id from comment inner join users on comment.user_id=users.user_id where course_id=:id");
        $statement->execute([':id'=>$id]);
        return $statement->fetchAll();
    }

    function deletecomment(int $id, int $user_id) :bool
    {   
        global $connection;
        $statement = $connection->prepare("delete from comment where comment_id=:id and user_id=:user_id");
        $statement->execute([':id' => $id,':user_id'=>$user_id]);
        $statement->fetchAll();
        return $statement->rowCount() > 0;
    
    }
    
    function createComment(int $user_id,int $course_id ,string $title,$date): bool
    {
        global $connection;
        $statement = $connection->prepare("INSERT INTO comment (user_id, course_id,title , date) VALUES (:user_id,:course_id,:title,:date)");
        $statement->execute([
            ':user_id'=>$user_id,
            ':course_id'=>$course_id,
            ':title' => $title,
            ':date'=>$date,
        ]);
        return $statement->rowCount() > 0;
    }
    function editComment(int $id) : array
    {
    global $connection;
    $statement = $connection->prepare("select * from comment where comment_id=:id");
    $statement->execute([':id' => $id]);
    return $statement->fetch();
    }
    
    function updateComment(string $title,int $id)
    {
        global $connection;
        $statement = $connection->prepare("UPDATE comment SET title = :title WHERE comment_id=:id");
        $statement->execute([
            ':title' => $title,
            ':id' => $id,
    
        ]);
    
        return $statement->rowCount() > 0;
    }
    
    ?>