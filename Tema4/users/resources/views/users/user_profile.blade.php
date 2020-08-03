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
        <p>Why not borrow some @if(count($transactions)) more @endif books?</p>
        <br>
        <p>Here are some books:</p>
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
                    <a href="{{url()->current().'/'.$book->id}}">View book</a>
                </td>
            </tr>
            @endforeach
        </table>

    </body>
</html>
