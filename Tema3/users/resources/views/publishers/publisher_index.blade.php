<html lang="ro">
<head>
    <title>View publishers</title>
    <link rel="stylesheet" type="text/css" href="{{url('css/styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/bootstrap.css')}}">
</head>
<body>

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
</table>

<br>
<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Created at</th>
        <th>Updated at</th>
        <th></th>
        <th></th>
    </tr>

    @foreach( $publishers as $publisher )
    <tr>
        <td>{{ $publisher->id }}</td>
        <td>{{ $publisher->name }}</td>
        <td>{{ $publisher->created_at }}</td>
        <td>{{ $publisher->updated_at }}</td>
        <td>
            <a href="{{action('PublisherController@edit').'?id='.$publisher->id }}">Edit publisher</a>
        </td>
        <td>
            <a href="{{action('PublisherController@delete').'?id='.$publisher->id }}">Delete publisher</a>
        </td>
    </tr>
    @endforeach
</table>
{{$publishers->links()}}

</body>
</html>
