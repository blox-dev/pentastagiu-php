<html>
<head>
    <title>Create author</title>
    <link rel="stylesheet" type="text/css" href="{{url('css/styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/bootstrap.css')}}">
</head>
<body>
<h3> Insert author details </h3>
<div>
    <form action="{{ action('AuthorController@store') }}" method="POST">
        @csrf
        <label for="name">Author name:</label><input type="text" id="name" name="name"><br>

        <input type="submit" class="submit_input" value="Add author">
    </form>
</div>
<body>
</html>
