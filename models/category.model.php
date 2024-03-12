<?php

function getCategorys(): array
{
    global $connection;
    $statement = $connection->prepare("select * from category");
    $statement->execute();
    return $statement->fetchAll();
}

function createCategory(string $category, string $image): bool
{
    global $connection;
    $statement = $connection->prepare("INSERT INTO category (cateName,image) VALUES(:cateName,:image)");
    $statement->execute([
        ':cateName' => $category,
        ':image' => $image

    ]);

    return $statement->rowCount() > 0;
}
function deletecategory(int $id): bool
{
    global $connection;
    $statement = $connection->prepare("delete from category where cat_id=:id");
    $statement->execute([':id' => $id]);
    $statement->fetchAll();
    return $statement->rowCount() > 0;
}
function getCategory(int $id): array
{
    global $connection;
    $statement = $connection->prepare("select * from category where cat_id=:id");
    $statement->execute([':id' => $id]);
    return $statement->fetch();
}
?>
<?php
function updateCategory(string $category, string $image, int $id)
{
    global $connection;
    $statement = $connection->prepare("UPDATE category SET cateName = :cateName,image= :image WHERE cat_id=:id");
    $statement->execute([
        ':cateName' => $category,
        ':image' => $image,
        ':id' => $id,

    ]);

    return $statement->rowCount() > 0;
}
function updateCategorynoImg(string $category,int $id)
{
    global $connection;
    $statement = $connection->prepare("UPDATE category SET cateName = :cateName WHERE cat_id=:id");
    $statement->execute([
        ':cateName' => $category,
        ':id' => $id,

    ]);

    return $statement->rowCount() > 0;
}

function displayCourseid($id)
{
    global $connection;
    $statement = $connection->prepare("SELECT course.course_id, course.course_img, course.paid, course.title, users.username,category.cateName FROM course INNER JOIN category ON category.cat_id=course.cate_id inner join users on users.user_id=course.user_id where course_id=:id;");
    $statement->execute(
        [':id' => $id],
    );
    return $statement->fetch();
}
?>
