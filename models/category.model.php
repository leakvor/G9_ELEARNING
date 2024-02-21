<?php

function getCategorys() : array
{
    global $connection;
    $statement = $connection->prepare("select * from category");
    $statement->execute();
    return $statement->fetchAll();
}
function createCategory(string $category) : bool
{
    global $connection;
    $statement = $connection->prepare("INSERT INTO category (cateName) VALUES(:cateName)");
    $statement->execute([
        ':cateName' => $category,
    ]);

    return $statement->rowCount() > 0;
}
function deletecategory(int $id) :bool
{   
    global $connection;
    $statement = $connection->prepare("delete from category where cat_id=:id");
    $statement->execute([':id' => $id]);
    $statement->fetchAll();
    return $statement->rowCount() > 0;

}
function getCategory(int $id) : array
{
global $connection;
$statement = $connection->prepare("select * from category where cat_id=:id");
$statement->execute([':id' => $id]);
return $statement->fetch();
}
?>
<?php
function updateCategory(string $category,int $id)
{
    global $connection;
    $statement = $connection->prepare("UPDATE category SET cateName = :cateName WHERE cat_id=:id");
    $statement->execute([
        ':cateName' => $category,
        ':id' => $id

    ]);

    return $statement->rowCount() > 0;
}
?>
