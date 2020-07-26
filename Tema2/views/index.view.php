<!doctype html>
<html lang="ro">
<head>
    <title>Library</title>
    <link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
<!--<a href="create">Add book</a>-->
<form action="create">
    <input type="submit" value="Add book">
</form>
<br>
<?php

echo "<table> <tr> <th>ID</th> <th>Title</th> <th>Author Name</th> <th>Publisher Name</th> <th>Publisher Year</th> <th>Created at</th> <th>Updated at</th> <th></th><th></th></tr>";

for($i=0; isset($books[$i]); $i++){
    echo "<tr> <td>".$books[$i]->id."</td> <td>".
        $books[$i]->title."</td> <td>".
        $books[$i]->author_name."</td> <td>".
        $books[$i]->publisher_name."</td> <td>".
        $books[$i]->publisher_year."</td> <td>".
        $books[$i]->created_at."</td> <td>".
        $books[$i]->updated_at."</td>";

    echo "<td><form action='edit'> <input type='hidden' name='id' value='".$books[$i]->id."'> <input type='submit' value='Edit book'> </form> </td>";
    echo "<td><form action='delete'> <input type='hidden' name='id' value='".$books[$i]->id."'> <input type='submit' value='Delete book'> </form> </td>";
    echo "</tr>";
}
echo "</table>";
?>
</body>
</html>