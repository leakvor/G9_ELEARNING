<?php
function getComment():array{
    global $connection;
    $statement=$connection->prepare("select * from comment");
    $statement->execute();
    return $statement->fetchAll();

}

function displayAllcomment($id)
{
    global $connection;
    $statement = $connection->prepare("select title,img,username from comment inner join users on comment.user_id=users.user_id where users.user_id=id;");
    $statement->execute([
        ':id' => $id,
    ]);
    return $statement->fetchAll();
}
 ?>