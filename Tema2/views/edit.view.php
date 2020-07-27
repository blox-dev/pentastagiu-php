<doctype html>
    <html>
    <head>
        <title>Edit book</title>
    </head>
    <body>
        <h3> Edit book details</h3>

        <form action='update' method='POST'>
            <input type='hidden' name='id' value='<?php echo $book->id ?>'>

            Book title: <input type='text' name='title' value='<?php echo $book->title ?>'><br>

            <label> Author name:
                <select name="author_id">
                    <?php foreach ($authors as $author): ?>
                        <option value="<?php echo $author->id ?>" <?php if($author->id == $book->author_id) echo "selected = \"selected\"" ?> > <?php echo $author->name ?> </option>
                    <?php endforeach; ?>
                </select>
            </label><br>

            <label> Publisher name:
                <select name="publisher_id">
                    <?php foreach ($publishers as $publisher): ?>
                        <option value="<?php echo $publisher->id ?>" <?php if($publisher->id == $book->publisher_id) echo "selected = \"selected\"" ?> > <?php echo $publisher->name ?> </option>
                    <?php endforeach; ?>
                </select>
            </label><br>

            Publisher year: <input type='text' name='publish_year' value='<?php echo $book->publish_year?>'><br>
            <input type='submit' value='Edit and go back'>
            </form>
    </body>
    </html>
