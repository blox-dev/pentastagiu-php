<html>
<head>
    <title>View book</title>
    <link rel="stylesheet" type="text/css" href="{{url('css/styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/bootstrap.css')}}">
</head>
<body>
    <p>Book details</p>
    <div>
        Title: {{$book->title}}<br>
        Author: {{$book->author->name}}<br>
        Publisher: {{$book->publisher->name}}<br>
        Publish year: {{$book->publish_year}}<br>
    </div>
    @if($bought == false)
    <form method="post" action="{{action('TransactionController@store')}}">
        @csrf
        <input type="hidden" name="book_id" value="{{$book->id}}">
        <input type="hidden" name="user_id" value="{{$user_id}}">
        <input type="submit" value="Borrow book for a month">
    </form>
    @else
    Book already bought<br>
    <a href="{{action('UserController@show',$user_id)}}">Go back to profile</a>
    @endif
</body>
</html>
