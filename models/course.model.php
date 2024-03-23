<?php

if (!function_exists('getCourse')) {
    function getCourse() {
        // Function logic here
        global $connection;
    $statement = $connection->prepare("SELECT course.course_id, course.course_img, course.title, course.paid, users.username,category.cateName FROM course INNER JOIN category ON category.cat_id=course.cate_id inner join users on users.user_id=course.user_id");
    $statement->execute();
    return $statement->fetchAll();
    }
}


function createCourse(string $title, string $img, int $user_id, int $cate_id, int $paid)
{
    global $connection;
    $statement = $connection->prepare("insert into course (title,course_img,paid,user_id,cate_id) values (:title, :img,:paid,:user_id,:cate_id)");
    $statement->execute([
        ':title' => $title,
        ':img' => $img,
        ':paid' => $paid,
        ':user_id' => $user_id,
        ':cate_id' => $cate_id,
    ]);
    return $statement->rowCount() > 0;
}

function deleteCourse(int $id): bool
{
    global $connection;
    $statement = $connection->prepare("delete from course where course_id = :id");
    $statement->execute([':id' => $id]);
    return $statement->rowCount() > 0;
}

function updateCourse(int $id, string $title, int $user_id, int $cate_id, string $img, int $paid): bool
{
    global $connection;
    $statement = $connection->prepare("update course set title = :title, user_id=:user_id,cate_id=:cate_id, course_img=:img, paid=:paid where course_id=:id");
    $statement->execute([
        ':id' => $id,
        ':title' => $title,
        ':user_id' => $user_id,
        ':cate_id' => $cate_id,
        ':img' => $img,
        ':paid' => $paid,
    ]);

    return $statement->rowCount() > 0;
}
function updateCourseNotImge(int $id, string $title, int $user_id, int $cate_id, int $paid): bool
{
    global $connection;
    $statement = $connection->prepare("update course set title = :title, user_id=:user_id,cate_id=:cate_id, paid=:paid where course_id=:id");
    $statement->execute([
        ':id' => $id,
        ':title' => $title,
        ':user_id' => $user_id,
        ':cate_id' => $cate_id,
        ':paid' => $paid,
    ]);

    return $statement->rowCount() > 0;
}
function editcourse(int $id, string $title, int $cate_id, int $paid): bool
{
    global $connection;
    $statement = $connection->prepare("update course set title = :title,cate_id=:cate_id, paid=:paid where course_id=:id");
    $statement->execute([
        ':id' => $id,
        ':title' => $title,
        ':cate_id' => $cate_id,
        ':paid' => $paid,
    ]);
    return $statement->rowCount() > 0;
}
function editcourseImg(int $id, string $title, int $cate_id, string $img, int $paid): bool
{
    global $connection;
    $statement = $connection->prepare("update course set title = :title,cate_id=:cate_id, course_img=:img, paid=:paid where course_id=:id");
    $statement->execute([
        ':id' => $id,
        ':title' => $title,
        ':cate_id' => $cate_id,
        ':img' => $img,
        ':paid' => $paid,
    ]);
    return $statement->rowCount() > 0;
}



function displayAllcourse($id)
{
    global $connection;
    $statement = $connection->prepare("select * from course where cate_id=:id");
    $statement->execute([
        ':id' => $id,
    ]);
    return $statement->fetchAll();
}

function displayCourses()
{
    global $connection;
    $statement = $connection->prepare("SELECT course.course_id, course.course_img, course.title, course.paid, users.username,category.cateName,users.img FROM course INNER JOIN category ON category.cat_id=course.cate_id inner join users on users.user_id=course.user_id");
    $statement->execute();
    return $statement->fetchAll();
}


function displayCourseCategory()
{
    global $connection;
    $statement = $connection->prepare("select * from category");
    $statement->execute();
    $categories = $statement->fetchAll();

    $categoryCoursesCount = [];

    // Looping through each category and counting the number of courses
    foreach ($categories as $category) {
        $statement = $connection->prepare("SELECT COUNT(*) AS count FROM course WHERE cate_id = ?");
        $statement->execute([$category['cat_id']]);
        $count = $statement->fetchColumn();
        $categoryCoursesCount[$category['cateName']] = $count;
    }
    return $categoryCoursesCount;
}

function trainerCourse($id)
{
    global $connection;
    $statement = $connection->prepare("select * from course where user_id=:id");
    $statement->execute(
        [':id' => $id]
    );
    return $statement->fetchAll();
}

function eachCourse($course_id)
{
    global $connection;
    $statement = $connection->prepare("select * from course where course_id=:id");
    $statement->execute([
        ':id' => $course_id,
    ]);
    return $statement->fetchAll();
}

function displaylessonid($id)
{
    global $connection;
    $statement = $connection->prepare("select * from lessons where lesson_id=:id");
    $statement->execute([':id' => $id]);
    return $statement->fetch();
}

function trainerCourseid($id)
{
    global $connection;
    $statement = $connection->prepare("select * from users where user_id=:id");
    $statement->execute(
        [':id' => $id]
    );
    return $statement->fetch();
}

function chartBar(): array {
    global $connection;

    // Prepare the SQL statement
    $statement = $connection->prepare("SELECT MONTH(date) AS month, 
                                        YEAR(date) AS year, 
                                        SUM(paid) AS total_paid 
                                        FROM payment 
                                        GROUP BY YEAR(date), MONTH(date) 
                                        ORDER BY YEAR(date), MONTH(date)");

    // Execute the statement
    $statement->execute();
    // Fetch the results as an associative array
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);

    // Return the result array
    return $result;
}

