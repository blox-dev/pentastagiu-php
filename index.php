<!doctype html>
    <html lang="ro">
        <head>
            <title>Library</title>
            <link rel="stylesheet" type="text/css" href="style.css">
        </head>
        <body>
            <form action="create.php">
                <input type="submit" value="Add book">
            </form>
            <br>
            <?php
                require("Database.php");
                $pdo = Database::get_connection();
                $statement = $pdo->prepare('select * from books');
                $statement -> execute();
                $results = $statement -> fetchAll(PDO::FETCH_ASSOC);

                echo "<table> <tr> <th>ID</th> <th>Title</th> <th>Author Name</th> <th>Publisher Name</th> <th>Publisher Year</th> <th>Created at</th> <th>Updated at</th> <th></th><th></th></tr>";
                for($i=0; isset($results[$i]); $i++){
                    echo "<tr> <td>".$results[$i]["id"]."</td> <td>".
                        $results[$i]["title"]."</td> <td>".
                        $results[$i]["author_name"]."</td> <td>".
                        $results[$i]["publisher_name"]."</td> <td>".
                        $results[$i]["publisher_year"]."</td> <td>".
                        $results[$i]["created_at"]."</td> <td>".
                        $results[$i]["updated_at"]."</td>";

                    echo "<td><form action='edit.php'> <input type='hidden' name='id' value='".$results[$i]["id"]."'> <input type='submit' value='Edit book'> </form> </td>";
                    echo "<td><form action='delete.php'> <input type='hidden' name='id' value='".$results[$i]["id"]."'> <input type='submit' value='Delete book'> </form> </td>";
                    echo "</tr>";
                }
                echo "</table>";
            ?>
        </body>
    </html>