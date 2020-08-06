<html lang="ro">
<head>
    <title>View users</title>
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
        <th>Username</th>
        <th>Created at</th>
        <th>Updated at</th>
    </tr>
    @foreach( $users as $user )
    <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->username }}</td>
        <td>{{ $user->created_at }}</td>
        <td>{{ $user->updated_at }}</td>
    </tr>
    @endforeach
</table>
{{$users->links()}}
</body>
</html>
