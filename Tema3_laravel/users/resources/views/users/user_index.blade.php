<html lang="ro">
<head>
    <title>View users</title>
    <link rel="stylesheet" type="text/css" href="{{url('css/styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/bootstrap.css')}}">
</head>
<body>

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
