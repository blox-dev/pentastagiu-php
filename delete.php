<?php
require("Database.php");
    $pdo = Database::get_connection();
    $id = $_GET["id"];
    $statement = $pdo->prepare('delete from books where id=:id');
    $arr = [
        "id" => $id
    ];

    $statement->execute($arr);
    header('Location: index.php');