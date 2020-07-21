<?php
require("Database.php");
$title = $_POST["title"];
$author_name = $_POST["author_name"];
$publisher_name = $_POST["publisher_name"];
$publisher_year = $_POST["publisher_year"];

$pdo = Database::get_connection();
$statement = $pdo -> prepare('insert into books values (null,:title,:author_name,:publisher_name,:publisher_year,sysdate(),sysdate())');

$arr = [
    "title" => $title,
    "author_name" => $author_name,
    "publisher_name" => $publisher_name,
    "publisher_year" => $publisher_year
];

$statement->execute($arr);

header('Location: index.php');