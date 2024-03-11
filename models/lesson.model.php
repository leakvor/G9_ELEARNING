<?php
function getLesson():array{
    global $connection;
    $statement = $connection->prepare("select * from lessons");
    $statement->execute();
    return $statement->fetchAll();
}
function createLesson(string $lesson, string $document,int $course_id) : bool
{
    global $connection;
    $statement = $connection->prepare("INSERT INTO lessons (lesson_title, document,course_id) VALUES (:lesson_title, :document,:id)");
    $statement->execute([
        ':lesson_title' => $lesson,
        ':document' => $document,
        ':id'=>$course_id,
    ]);

    return $statement->rowCount() > 0;
}
function deleteLesson(int $id) :bool
{   
    global $connection;
    $statement = $connection->prepare("delete from lessons where lesson_id=:id");
    $statement->execute([':id' => $id]);
    $statement->fetchAll();
    return $statement->rowCount() > 0;

}
function editLesson(int $id) : array
{
global $connection;
$statement = $connection->prepare("select * from lessons where lesson_id=:id");
$statement->execute([':id' => $id]);
return $statement->fetch();
}

function updateLesson(string $lesson,string $document,int $id)
{
    global $connection;
    $statement = $connection->prepare("UPDATE lessons SET lesson_title = :lesson_title,document= :document WHERE lesson_id=:id");
    $statement->execute([
        ':lesson_title' => $lesson,
        ':document'=>$document,
        ':id' => $id,

    ]);

    return $statement->rowCount() > 0;
}

function displayAlllesson(int $id){
    global $connection;
    $statement = $connection->prepare("select * from lessons where course_id=:id");
    $statement->execute([
        ':id'=>$id,
    ]);
    return $statement->fetchAll();
}

?>


