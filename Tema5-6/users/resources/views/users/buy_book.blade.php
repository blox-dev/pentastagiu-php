<html>
<head>
    <title>View book</title>
    <link rel="stylesheet" type="text/css" href="{{url('css/styles.css')}}">
</head>
<body>
    <p>Book details</p>
    <div class="form-div">
        Title: {{$book->title}}<br>
        Author: {{$book->author->name}}<br>
        Publisher: {{$book->publisher->name}}<br>
        Publish year: {{$book->publish_year}}<br>
    </div>
    @auth
        @if($bought == false)
        <form method="post" action="{{action('TransactionController@store')}}">
            @csrf
            <input type="hidden" name="book_id" value="{{$book->id}}">
            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
            <input type="submit" value="Borrow book for a month">
        </form>
        @else
        Book already bought<br>
        <a href="{{action('UserController@show')}}">Go back to profile</a>
        @endif
    @else
        Not logged in lmao
    @endauth
</body>
</html>
