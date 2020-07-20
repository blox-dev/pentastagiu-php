<!doctype html>
    <html lang="ro">
        <head>
            <title>lol</title>
        </head>
        <body>
            <form action="create.php">
                <input type="submit" value="Add book">
            </form>
            <?php
                $pdo = new PDO('mysql:host=localhost;dbname=test','root','');
                $statement = $pdo->prepare('select * from books');
                $statement -> execute();
                $results = $statement -> fetchAll(PDO::FETCH_ASSOC);

                for($i=0; isset($results[$i]); $i++){
                    echo $results[$i]["id"].' '.
                        $results[$i]["title"].' '.
                        $results[$i]["author_name"].' '.
                        $results[$i]["publisher_name"].' '.
                        $results[$i]["publisher_year"].' '.
                        $results[$i]["created_at"].' '.
                        $results[$i]["updated_at"];

                    echo "<form action='edit.php'> <input type='hidden' name='id' value='".$results[$i]["id"]."'> <input type='submit' value='Edit book'> </form>";
                    echo "<form action='delete.php'> <input type='hidden' name='id' value='".$results[$i]["id"]."'> <input type='submit' value='Delete book'> </form>";
                    echo '<br>';
                }
            ?>
        </body>
    </html>