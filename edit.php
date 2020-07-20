<doctype html>
    <html>
    <head>
        <title>Edit book</title>
    </head>
    <body>
        <?php
            $pdo = new PDO('mysql:host=localhost;dbname=test','root','');
            $statement = $pdo->prepare('select * from books where id =:id');
            $id=$_GET["id"];
            $arr = [
                "id" => $id
            ];

            $statement->execute($arr);
            $results = $statement -> fetchAll(PDO::FETCH_ASSOC);

            echo "<form action='update.php' method='POST'>";
            echo "<input type='hidden' name='id' value='".$id."'>";
            echo "title: <input type='text' name='title' value='".$results[0]["title"]."'><br>";
            echo "author name: <input type='text' name='author_name' value='".$results[0]["author_name"]."'><br>";
            echo "publisher name: <input type='text' name='publisher_name' value='".$results[0]["publisher_name"]."'><br>";
            echo "publisher year: <input type='text' name='publisher_year' value='".$results[0]["publisher_year"]."'><br>";
            echo "<input type='submit' value='Edit and go back'>";
            echo "</form>";
        ?>
    </body>
    </html>
