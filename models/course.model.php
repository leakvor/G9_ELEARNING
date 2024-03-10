<?php 

function getCourse() : array
{
    global $connection;
    $statement = $connection->prepare("SELECT course.course_id, course.course_img, course.title, course.paid, users.username,category.cateName FROM course INNER JOIN category ON category.cat_id=course.cate_id inner join users on users.user_id=course.user_id");
    $statement->execute();
    return $statement->fetchAll();
}

function createCourse( string $title,string $img ,int $user_id,int $cate_id,int $paid)
{
    global $connection;
    $statement = $connection->prepare("insert into course (title,course_img,paid,user_id,cate_id) values (:title, :img,:paid,:user_id,:cate_id)");
    $statement->execute([
        ':title'=>$title,
        ':img'=>$img,
        ':paid'=>$paid,
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

function updateCourse(int $id,string $title,int $user_id,int $cate_id,string $img,int $paid) : bool
{
    global $connection;
    $statement = $connection->prepare("update course set title = :title, user_id=:user_id,cate_id=:cate_id, course_img=:img, paid=:paid where course_id=:id");
    $statement->execute([
        ':id'=>$id,
        ':title' => $title,
        ':user_id'=>$user_id,
        ':cate_id'=>$cate_id,
        ':img'=>$img,
        ':paid'=>$paid,
    ]);

    return $statement->rowCount() > 0;
}

function updateCourseNotImge(int $id,string $title,int $user_id,int $cate_id,int $paid) : bool
{
    global $connection;
    $statement = $connection->prepare("update course set title = :title, user_id=:user_id,cate_id=:cate_id, paid=:paid where course_id=:id");
    $statement->execute([
        ':id'=>$id,
        ':title' => $title,
        ':user_id'=>$user_id,
        ':cate_id'=>$cate_id,
        ':paid'=>$paid,
    ]);

    return $statement->rowCount() > 0;
}
function editcourse(int $id,string $title,int $cate_id,int $paid) : bool
{
    global $connection;
    $statement = $connection->prepare("update course set title = :title,cate_id=:cate_id, paid=:paid where course_id=:id");
    $statement->execute([
        ':id'=>$id,
        ':title' => $title,
        ':cate_id'=>$cate_id,
        ':paid'=>$paid,
    ]);
    return $statement->rowCount() > 0;
}
function editcourseImg(int $id,string $title,int $cate_id,string $img,int $paid) : bool
{
    global $connection;
    $statement = $connection->prepare("update course set title = :title,cate_id=:cate_id, course_img=:img, paid=:paid where course_id=:id");
    $statement->execute([
        ':id'=>$id,
        ':title' => $title,
        ':cate_id'=>$cate_id,
        ':img'=>$img,
        ':paid'=>$paid,
    ]);
    return $statement->rowCount() > 0;
}



function displayAllcourse($id){
    global $connection;
    $statement = $connection->prepare("select * from course where cate_id=:id");
    $statement->execute([
        ':id'=>$id,
    ]);
    return $statement->fetchAll();
}
function eachCourse($course_id){
    global $connection;
    $statement = $connection->prepare("select * from course where course_id=:id");
    $statement->execute([
        ':id'=>$course_id,
    ]); 
    return $statement->fetchAll();
}