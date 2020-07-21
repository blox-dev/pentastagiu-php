<?php
require("Database.php");
$title = $_POST["title"];
$author_name = $_POST["author_name"];
$publisher_name = $_POST["publisher_name"];
$publisher_year = $_POST["publisher_year"];
$id = $_POST["id"];


$pdo = Database::get_connection();
$statement = $pdo -> prepare('update books set title=:title, author_name=:author_name, publisher_name=:publisher_name, publisher_year=:publisher_year where id=:id');

$arr = [
    "title" => $title,
    "author_name" => $author_name,
    "publisher_name" => $publisher_name,
    "publisher_year" => $publisher_year,
    "id" => $id
];

$statement->execute($arr);
header('Location: index.php');

