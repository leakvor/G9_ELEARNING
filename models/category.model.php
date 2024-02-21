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