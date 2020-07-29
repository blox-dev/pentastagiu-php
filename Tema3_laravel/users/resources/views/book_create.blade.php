<html>
<head>
    <title>Create book</title>
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
<h3> Insert book details </h3>
<div>
<form action="{{ action('BookController@store') }}" method="POST">
    @csrf
    <label for="title">Book title:</label><input type="text" id="title" name="title"><br>

    <label> Author name:
        <select name="author_id">
            @foreach ($authors as $author)
                <option value="{{$author->id}}"> {{$author->name}} </option>
            @endforeach
        </select>
    </label><br>

    <label> Publisher name:
        <select name="publisher_id">
            @foreach ($publishers as $publisher)
            <option value="{{$publisher->id}}"> {{$publisher->name}} </option>
            @endforeach
        </select>
    </label><br>

    <label for="publish_year">Publisher year: </label><input type="text" id="publish_year" name="publish_year"><br>
    <input type="submit" value="Add book">
</form>
</div>
<body>
</html>
