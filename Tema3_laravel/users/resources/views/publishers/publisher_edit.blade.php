<html lang="en">
<head>
    <title>Edit publisher</title>
    <link rel="stylesheet" type="text/css" href="{{url('css/styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/bootstrap.css')}}">
</head>
<body>
<h3> Edit publisher details</h3>

<form action="{{ action('PublisherController@update') }}" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{$publisher->id}}">

    <label for="name">Publisher name:</label><input type="text" name="name" value="{{$publisher->name}}"><br>

    <input type="submit" class="submit_input" value="Edit and go back">
</form>
</body>
</html>
