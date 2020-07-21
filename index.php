<!doctype html>
    <html lang="ro">
        <head>
            <title>Library</title>
            <style>
                table {
                    font-family: arial, sans-serif;
                    border-collapse: collapse;
                    width: 100%;
                }

                td, th {
                    border: 1px solid #dddddd;
                    text-align: left;
                    padding: 8px;
                }

                tr:nth-child(even) {
                    background-color: #dddddd;
                }
            </style>

        </head>
        <body>
            <form action="create.php">
                <input type="submit" value="Add book">
            </form>
            <?php
                require("Database.php");
                $pdo = Database::get_connection();
                $statement = $pdo->prepare('select * from books');
                $statement -> execute();
                $results = $statement -> fetchAll(PDO::FETCH_ASSOC);

                echo "<table> <tr> <th>ID</th> <th>Title</th> <th>Author Name</th> <th>Publisher Name</th> <th>Publisher Year</th> <th>Created at</th> <th>Updated at</th> <th></th><th></th></tr>";
                for($i=0; isset($results[$i]); $i++){
                    echo "<tr> <th>".$results[$i]["id"]."</th> <th>".
                        $results[$i]["title"]."</th> <th>".
                        $results[$i]["author_name"]."</th> <th>".
                        $results[$i]["publisher_name"]."</th> <th>".
                        $results[$i]["publisher_year"]."</th> <th>".
                        $results[$i]["created_at"]."</th> <th>".
                        $results[$i]["updated_at"]."</th>";

                    echo "<th><form action='edit.php'> <input type='hidden' name='id' value='".$results[$i]["id"]."'> <input type='submit' value='Edit book'> </form> </th>";
                    echo "<th><form action='delete.php'> <input type='hidden' name='id' value='".$results[$i]["id"]."'> <input type='submit' value='Delete book'> </form> </th>";
                    echo "</tr>";
                }
                echo "</table>";
            ?>
        </body>
    </html>