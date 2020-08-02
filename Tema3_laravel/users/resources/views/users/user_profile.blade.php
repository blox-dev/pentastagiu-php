<html>
    <head>
        <title>{{ucfirst($username)}}'s profile.</title>
        <link rel="stylesheet" type="text/css" href="{{url('css/styles.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('css/bootstrap.css')}}">
    </head>
    <body>
        <p>Yo what's up, {{$username}}. Wanna borrow a book?</p>
        @if(count($transactions))
            <p>Here are your borrowed books:</p>
            <table>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Publisher</th>
                    <th>Publish year</th>
                </tr>
                @foreach($transactions as $transaction)
                <tr>
                    <td>{{$transaction->book->title}}</td>
                    <td>{{$transaction->book->author->name}}</td>
                    <td>{{$transaction->book->publisher->name}}</td>
                    <td>{{$transaction->book->publish_year}}</td>
                </tr>
                @endforeach
            </table>
        @endif
        <br>
        Why not borrow some @if(count($transactions)) more @endif books?
    </body>
</html>
