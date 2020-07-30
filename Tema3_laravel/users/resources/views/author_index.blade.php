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
        <th>Name</th>
        <th>Created at</th>
        <th>Updated at</th>
        <th></th>
    </tr>

    @foreach( $authors as $author )
    <tr>
        <td>{{ $author->id }}</td>
        <td>{{ $author->name }}</td>
        <td>{{ $author->created_at }}</td>
        <td>{{ $author->updated_at }}</td>
        <td>
            <form action="{{ action('AuthorController@delete') }}">
                <input type="hidden" name="id" value="{{$author->id}}">
                <input type="submit" value="Delete author">
            </form>
        </td>
    </tr>
    @endforeach

</body>
</html>
