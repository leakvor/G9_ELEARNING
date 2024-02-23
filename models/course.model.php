<?php 

function getCourse() : array
{
    global $connection;
    $statement = $connection->prepare("SELECT course.course_id, course.img, course.title, users.username,category.cateName FROM course INNER JOIN category ON category.cat_id=course.cate_id inner join users on users.user_id=course.user_id");
    $statement->execute();
    return $statement->fetchAll();
}

function createCourse( string $title,string $img,int $user_id,int $cate_id)
{
    global $connection;
    $statement = $connection->prepare("insert into course (title,img,user_id,cate_id) values (:title, :img,:user_id,:cate_id)");
    $statement->execute([
        ':title'=>$title,
        ':img'=>$img,
        ':user_id'=>$user_id,
        ':cate_id'=>$cate_id,
    ]);

    return $statement->rowCount() > 0;
}

function deleteCourse(int $id) : bool
{
    global $connection;
    $statement = $connection->prepare("delete from course where course_id = :id");
    $statement->execute([':id' => $id]);
    return $statement->rowCount() > 0;
}