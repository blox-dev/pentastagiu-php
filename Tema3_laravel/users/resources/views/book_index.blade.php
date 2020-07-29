<!doctype html>
<html lang="ro">
<head>
    <title>Library</title>
    <style>
        table{
            font-family: arial,sans-serif;
            border-collapse: collapse;
            width:100%;
        }
        td,th{
            border:1px solid #dddddd;
            text-align:left;
            padding:8px;
        }
        tr:nth-child(even){
            background-color: #dddddd;
        }
    </style>
</head>
<body>

<form action="{{ action('BookController@create') }}">
    <input type="submit" value="Add book">
</form>
<br>
<table>
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Author Name</th>
        <th>Publisher Name</th>
        <th>Publish Year</th>
        <th>Created at</th>
        <th>Updated at</th>
        <th></th>
        <th></th>
    </tr>

    @foreach( $books as $book )
    <tr>
        <td>{{ $book->id }}</td>
        <td>{{ $book->title }}</td>
        <td>{{ $book->author_name }}</td>
        <td>{{ $book->publisher_name }}</td>
        <td>{{ $book->publish_year }}</td>
        <td>{{ $book->created_at }}</td>
        <td>{{ $book->updated_at }}</td>
        <td>
            <form action="{{ action('BookController@edit') }}">
                <input type="hidden" name="id" value="{{$book->id}}">
                <input type="submit" value="Edit book">
            </form>
        </td>
        <td>
            <form action="{{ action('BookController@delete') }}">
                <input type="hidden" name="id" value="{{$book->id}}">
                <input type="submit" value="Delete book">
            </form>
        </td>
    </tr>
    @endforeach

</body>
</html>
