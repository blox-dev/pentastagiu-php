<!doctype html>
<html lang="ro">
<head>
    <title>Library</title>
    <link rel="stylesheet" type="text/css" href="{{url('css/styles.css')}}">
</head>
<body>

<table>
    <tr>
        <th>View Libraries</th>
        <th>Add item</th>
    </tr>
    <tr>
        <td>
            <form action="{{ action('BookController@index') }}">
                <input type="submit" value="View books">
            </form>
        </td>
        <td>
            <form action="{{ action('BookController@create') }}">
                <input type="submit" value="Add book">
            </form>
        </td>
    </tr>
    <tr>
        <td>
            <form action="{{ action('AuthorController@index') }}">
                <input type="submit" value="View authors">
            </form>
        </td>
        <td>
            <form action="{{ action('AuthorController@create') }}">
                <input type="submit" value="Add author">
            </form>
        </td>
    </tr>
    <tr>
        <td>
            <form action="{{ action('PublisherController@index') }}">
                <input type="submit" value="View publishers">
            </form>
        </td>
        <td>
            <form action="{{ action('PublisherController@create') }}">
                <input type="submit" value="Add publisher">
            </form>
        </td>
    </tr>
</table>


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
