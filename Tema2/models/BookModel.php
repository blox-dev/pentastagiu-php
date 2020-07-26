<?php
require_once("./utils/database.php");

class BookModel
{

    public function index() : array
    {
        $pdo = Database::get_connection();
        $statement = $pdo->prepare('select * from books');
        $statement -> execute();
        return $statement -> fetchAll(PDO::FETCH_OBJ);
    }

    public function store()
    {
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
    }
    public function edit()
    {
        $pdo = Database::get_connection();
        $statement = $pdo->prepare('select * from books where id =:id');
        $id=$_GET["id"];

        $statement->execute([
            "id" => $id
        ]);

        return $statement -> fetch(PDO::FETCH_OBJ);
    }
    public function update()
    {
        $title = $_POST["title"];
        $author_name = $_POST["author_name"];
        $publisher_name = $_POST["publisher_name"];
        $publisher_year = $_POST["publisher_year"];
        $id = $_POST["id"];


        $pdo = Database::get_connection();
        $statement = $pdo -> prepare('update books set title=:title, author_name=:author_name, publisher_name=:publisher_name, publisher_year=:publisher_year, updated_at=sysdate() where id=:id');

        $arr = [
            "title" => $title,
            "author_name" => $author_name,
            "publisher_name" => $publisher_name,
            "publisher_year" => $publisher_year,
            "id" => $id
        ];

        $statement->execute($arr);
    }
    public function delete()
    {
        $pdo = Database::get_connection();
        $statement = $pdo->prepare('delete from books where id=:id');

        $id = $_GET["id"];
        $statement->execute([
            "id" => $id
        ]);
    }
}