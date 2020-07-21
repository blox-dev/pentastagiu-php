<doctype html>
    <html>
    <head>
        <title>Edit book</title>
    </head>
    <body>
        <h3> Edit book details</h3>
        <?php
            require("Database.php");
            $pdo = Database::get_connection();
            $statement = $pdo->prepare('select * from books where id =:id');
            $id=$_GET["id"];

            $statement->execute([
                "id" => $id
            ]);

            $results = $statement -> fetchAll(PDO::FETCH_ASSOC);

            echo "<form action='update.php' method='POST'>";
            echo "<input type='hidden' name='id' value='".$id."'>";
            echo "Book title: <input type='text' name='title' value='".$results[0]["title"]."'><br>";
            echo "Author name: <input type='text' name='author_name' value='".$results[0]["author_name"]."'><br>";
            echo "Publisher name: <input type='text' name='publisher_name' value='".$results[0]["publisher_name"]."'><br>";
            echo "Publisher year: <input type='text' name='publisher_year' value='".$results[0]["publisher_year"]."'><br>";
            echo "<input type='submit' value='Edit and go back'>";
            echo "</form>";
        ?>
    </body>
    </html>
