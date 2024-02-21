<?php

function getCategorys() : array
{
    global $connection;
    $statement = $connection->prepare("select * from category");
    $statement->execute();
    return $statement->fetchAll();
}