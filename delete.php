<?php
    $pdo = new PDO('mysql:host=localhost;dbname=test','root','');
    $id = $_GET["id"];
    $statement = $pdo->prepare('delete from books where id=:id');
    $arr = [
        "id" => $id
    ];

    $statement->execute($arr);
    header('Location: index.php');