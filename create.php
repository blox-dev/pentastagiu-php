<!doctype html>
<html>
    <head>
        <title>create</title>
    </head>
    <body>
    <h1> Insert book </h1>
        <form action="store.php" method="POST">
            title: <input type="text" id="title" name="title"><br>
            author name: <input type="text" id="author_name" name="author_name"><br>
            publisher name: <input type="text" id="publisher_name" name="publisher_name"><br>
            publisher year: <input type="text" id="publisher_year" name="publisher_year"><br>
            <input type="hidden" name="create" value="true">
            <input type="submit">
        </form>
    <body>
</html>
