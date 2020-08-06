<html>
    <head>
        <title>{{ucfirst($user->username)}}'s profile.</title>
        <link rel="stylesheet" type="text/css" href="{{url('css/styles.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('css/bootstrap.css')}}">
    </head>
    <body>
        <p>Yo what's up, {{$user->username}}. Wanna borrow a book?</p>

        @if(count($user_books->book))
            <p>Here are your borrowed books:</p>
            <table>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Publisher</th>
                    <th>Publish year</th>
                    <th>Return date</th>
                    <th>Return book</th>
                </tr>
                @foreach($user_books->book as $book)
                <tr>
                    <td>{{$book->title}}</td>
                    <td>{{$book->author->name}}</td>
                    <td>{{$book->publisher->name}}</td>
                    <td>{{$book->publish_year}}</td>
                    <td>{{$book->pivot->return_time}}</td>
                    <td>
                        <form method="post" action="{{action('TransactionController@delete')}}">
                            @csrf
                            <input type="hidden" id="book_id" name="book_id" value="{{$book->id}}">
                            <input type="hidden" id="user_id" name="user_id" value="{{$user->id}}">
                            <input type="submit" value="Return book">
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        @endif
        <br>
        <p>Why not borrow some @if(count($user_books->book)) more @endif books?</p>
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
        {{$books->links()}}
    </body>
</html>
