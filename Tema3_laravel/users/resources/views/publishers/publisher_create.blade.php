<html>
<head>
    <title>Create publisher</title>
    <link rel="stylesheet" type="text/css" href="{{url('css/styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/bootstrap.css')}}">
</head>
<body>
<h3> Insert publisher details </h3>
<div>
    <form action="{{ action('PublisherController@store') }}" method="POST">
        @csrf
        <label for="name">Publisher name:</label><input type="text" id="name" name="name"><br>

        <input type="submit" class="submit_input" value="Add publisher">
    </form>
</div>
<body>
</html>
