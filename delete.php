<?php
    require_once("Database.php");
    $pdo = Database::get_connection();
    $statement = $pdo->prepare('delete from books where id=:id');

    $id = $_GET["id"];
    $statement->execute([
        "id" => $id
    ]);
    header('Location: index.php');