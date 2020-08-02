<html lang="en">
<head>
    <title>Edit author</title>
    <link rel="stylesheet" type="text/css" href="{{url('css/styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/bootstrap.css')}}">
</head>
<body>
<h3> Edit author details</h3>

<form action="{{ action('AuthorController@update') }}" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{$author->id}}">

    <label for="name">Author name:</label><input type="text" name="name" value="{{$author->name}}"><br>

    <input type="submit" class="submit_input" value="Edit and go back">
</form>
</body>
</html>
