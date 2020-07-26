<doctype html>
    <html>
    <head>
        <title>Edit book</title>
    </head>
    <body>
        <h3> Edit book details</h3>
        <?php
            echo "<form action='update' method='POST'>";
            echo "<input type='hidden' name='id' value='".$book->id."'>";
            echo "Book title: <input type='text' name='title' value='".$book->title."'><br>";
            echo "Author name: <input type='text' name='author_name' value='".$book->author_name."'><br>";
            echo "Publisher name: <input type='text' name='publisher_name' value='".$book->publisher_name."'><br>";
            echo "Publisher year: <input type='text' name='publisher_year' value='".$book->publisher_year."'><br>";
            echo "<input type='submit' value='Edit and go back'>";
            echo "</form>";
        ?>
    </body>
    </html>
