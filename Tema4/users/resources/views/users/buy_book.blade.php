<html>
<head>
    <title>View book</title>
    <link rel="stylesheet" type="text/css" href="{{url('css/styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/bootstrap.css')}}">
</head>
<body>
    <div>
        {{$book->title}}<br>
        {{$book->author->name}}<br>
        {{$book->publisher->name}}<br>
        {{$book->publish_year}}<br>
    </div>
    <form method="post" action="{{action('TransactionController@store')}}">
        @csrf
        <input type="hidden" name="book_id" value="{{$book->id}}">
        <input type="hidden" name="user_id" value="{{$user_id}}">
        <input type="submit" value="Buy book">
    </form>
</body>
</html>
