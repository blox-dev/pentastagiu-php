<!doctype html>
<html>
    <head>
        <title>create</title>
    </head>
    <body>
    <h3> Insert book details </h3>

        <form action="store" method="POST">
            <label for="title">Book title:</label><input type="text" id="title" name="title"><br>

            <label> Author name:
                <select name="author_id">
                    <?php foreach ($authors as $author): ?>
                    <option value="<?php echo $author->id ?>"> <?php echo $author->name ?> </option>
                    <?php endforeach; ?>
                </select>
            </label><br>

            <label> Publisher name:
                <select name="publisher_id">
                    <?php foreach ($publishers as $publisher): ?>
                        <option value="<?php echo $publisher->id ?>"> <?php echo $publisher->name ?> </option>
                    <?php endforeach; ?>
                </select>
            </label><br>

            <label for="publish_year">Publisher year: </label><input type="text" id="publish_year" name="publish_year"><br>
            <input type="submit" value="Add book">
        </form>
    <body>
</html>
