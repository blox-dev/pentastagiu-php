<html lang="ro">
<head>
    <title>View transactions</title>
    <link rel="stylesheet" type="text/css" href="{{url('css/styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/bootstrap.css')}}">
</head>
<body>

<table>
    <tr>
        <th>ID</th>
        <th>Book ID</th>
        <th>User ID</th>
        <th>Transaction time</th>
        <th>Return time</th>
        <th>Created at</th>
        <th>Updated at</th>
    </tr>
    @foreach( $transactions as $transaction )
    <tr>
        <td>{{ $transaction->id }}</td>
        <td>{{ $transaction->book_id }}</td>
        <td>{{ $transaction->user_id }}</td>
        <td>{{ $transaction->transaction_time }}</td>
        <td>{{ $transaction->return_time }}</td>
        <td>{{ $transaction->created_at }}</td>
        <td>{{ $transaction->updated_at }}</td>
    </tr>
    @endforeach
</table>
{{$transactions->links()}}
</body>
</html>
