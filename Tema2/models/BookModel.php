<?php
require_once("./utils/database.php");

class BookModel
{
    public function index() : array
    {
        $pdo = Database::get_connection();
        $statement = $pdo->prepare('select books.*, authors.name as author_name,publishers.name as publisher_name 
                                                from books 
                                                join authors on books.author_id = authors.id 
                                                join publishers on books.publisher_id=publishers.id');
        $statement -> execute();
        return $statement -> fetchAll(PDO::FETCH_OBJ);
    }

    public function create() : array
    {
        $pdo = Database::get_connection();
        $statement = $pdo->prepare('select * from authors');
        $statement->execute();

        $authors = $statement -> fetchAll(PDO::FETCH_OBJ);

        $statement = $pdo->prepare('select * from publishers');
        $statement->execute();

        $publishers = $statement -> fetchAll(PDO::FETCH_OBJ);

        return ["authors" => $authors, "publishers" => $publishers];
    }

    public function store()
    {
        $title = $_POST["title"];
        $author_id = $_POST["author_id"];
        $publisher_id = $_POST["publisher_id"];
        $publish_year = $_POST["publish_year"];

        $pdo = Database::get_connection();
        $statement = $pdo -> prepare('insert into books values (null,:title,:author_id,:publisher_id,:publish_year,sysdate(),sysdate())');

        $arr = [
            "title" => $title,
            "author_id" => $author_id,
            "publisher_id" => $publisher_id,
            "publish_year" => $publish_year
        ];

        $statement->execute($arr);
    }
    public function edit()
    {
        $pdo = Database::get_connection();
        $statement = $pdo->prepare('select books.*, authors.name as author_name,publishers.name as publisher_name 
                                                from books 
                                                join authors on books.author_id = authors.id 
                                                join publishers on books.publisher_id=publishers.id 
                                                    where books.id = :id');
        $id=$_GET["id"];

        $statement->execute([
            "id" => $id
        ]);

        $book = $statement -> fetch(PDO::FETCH_OBJ);

        $statement = $pdo->prepare('select * from authors');
        $statement->execute();

        $authors = $statement -> fetchAll(PDO::FETCH_OBJ);

        $statement = $pdo->prepare('select * from publishers');
        $statement->execute();

        $publishers = $statement -> fetchAll(PDO::FETCH_OBJ);

        return ["book" => $book, "authors" => $authors, "publishers" => $publishers];
    }
    public function update()
    {
        $title = $_POST["title"];
        $author_id = $_POST["author_id"];
        $publisher_id = $_POST["publisher_id"];
        $publish_year = $_POST["publish_year"];
        $id = $_POST["id"];


        $pdo = Database::get_connection();
        $statement = $pdo -> prepare('update books set title=:title, author_id=:author_id, publisher_id=:publisher_id, publish_year=:publish_year, updated_at=sysdate() where id=:id');

        $arr = [
            "title" => $title,
            "author_id" => $author_id,
            "publisher_id" => $publisher_id,
            "publish_year" => $publish_year,
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