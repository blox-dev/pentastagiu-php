<html lang="ro">
<head>
    <title>View books</title>
    <link rel="stylesheet" type="text/css" href="{{url('css/styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/bootstrap.css')}}">
</head>
<body>

<p><a href="{{url('/')}}">Go to index</a></p>

<table>
    <tr>
        <th>View Libraries</th>
        <th>Add item</th>
    </tr>
    <tr>
        <td>
            <a href="{{action('BookController@index')}}">View books</a>
        </td>
        <td>
            <a href="{{action('BookController@create')}}">Add book</a>
        </td>
    </tr>
    <tr>
        <td>
            <a href="{{action('AuthorController@index')}}">View authors</a>
        </td>
        <td>
            <a href="{{action('AuthorController@create')}}">Add author</a>
        </td>
    </tr>
    <tr>
        <td>
            <a href="{{action('PublisherController@index')}}">View publishers</a>
        </td>
        <td>
            <a href="{{action('PublisherController@create')}}">Add publisher</a>
        </td>
    </tr>
    <tr>
        <td>
            <a href="{{action('UserController@index')}}">View users</a>
        </td>
        <td>not yet</td>
    </tr>
    <tr>
        <td>
            <a href="{{action('TransactionController@index')}}">View transactions</a>
        </td>
        <td>not yet</td>
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
        <td>{{ $book->author->name }}</td>
        <td>{{ $book->publisher->name }}</td>
        <td>{{ $book->publish_year }}</td>
        <td>{{ $book->created_at }}</td>
        <td>{{ $book->updated_at }}</td>
        <td>
            <a href="{{action('BookController@edit').'?id='.$book->id }}">Edit book</a>
        </td>
        <td>
            <a href="{{action('BookController@delete').'?id='.$book->id }}">Delete book</a>
        </td>
    </tr>
    @endforeach
</table>
    {{$books->links()}}
</body>
</html>
