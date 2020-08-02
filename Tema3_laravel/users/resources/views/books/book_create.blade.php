<html>
<head>
    <title>Create book</title>
    <link rel="stylesheet" type="text/css" href="{{url('css/styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/bootstrap.css')}}">
</head>
<body>
<h3> Insert book details </h3>

@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif

<div>
    <form action="{{ action('BookController@store') }}" method="POST">
        @csrf
        <label for="title">Book title:</label><input type="text" id="title" name="title"><br>

        <label> Author name:
            <select name="author_id">
                @foreach ($authors as $author)
                <option value="{{$author->id}}"> {{$author->name}} </option>
                @endforeach
            </select>
        </label><br>

        <label> Publisher name:
            <select name="publisher_id">
                @foreach ($publishers as $publisher)
                <option value="{{$publisher->id}}"> {{$publisher->name}} </option>
                @endforeach
            </select>
        </label><br>

        <label for="publish_year">Publisher year: </label><input type="text" id="publish_year" name="publish_year"><br>
        <input type="submit" class="submit_input" value="Add book">
    </form>
</div>
<body>
</html>
