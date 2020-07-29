 <html lang="en">
    <head>
        <title>Edit book</title>
        <style>
            input[type=text], select {
                width: 100%;
                padding: 12px 20px;
                margin: 8px 0;
                display: inline-block;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
            }

            input[type=submit] {
                width: 100%;
                background-color: #4CAF50;
                color: white;
                padding: 14px 20px;
                margin: 8px 0;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }

            input[type=submit]:hover {
                background-color: #45a049;
            }

            div {
                border-radius: 5px;
                background-color: #f2f2f2;
                padding: 20px;
            }
        </style>
    </head>
    <body>
    <h3> Edit book details</h3>

    <form action="{{ action('BookController@update') }}" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{$book->id}}">

        Book title: <input type="text" name="title" value="{{$book->title}}"><br>

        <label> Author name:
            <select name="author_id">
                @foreach ($authors as $author)
                <option value="{{$author->id}}"
                        @if( $author->id == $book->author_id)
                            selected="selected"
                        @endif> {{$author->name}} </option>
                @endforeach
            </select>
        </label><br>

        <label> Publisher name:
            <select name="publisher_id">
                @foreach ($publishers as $publisher)
                <option value="{{$publisher->id}}"
                        @if( $publisher->id == $book->publisher_id)
                            selected="selected"
                        @endif> {{$publisher->name}} </option>
                @endforeach
            </select>
        </label><br>

        Publisher year: <input type="text" name="publish_year" value="{{$book->publish_year}}"><br>
        <input type="submit" value="Edit and go back">
    </form>
    </body>
 </html>

