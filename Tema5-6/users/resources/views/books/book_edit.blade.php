<html lang="en">
<head>
    <title>Edit book</title>
    <link rel="stylesheet" type="text/css" href="{{url('css/styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/bootstrap.css')}}">
</head>
<body>
<h3> Edit book details</h3>

@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="form-div">
<form action="{{ action('BookController@update') }}" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{$book->id}}">

    Book title: <input type="text" name="title" value="{{$book->title}}"><br>

    <label> Author name:
        <select name="author_id">
            @foreach ($authors as $author)
            <option value="{{$author->id}}"
                    @if( $author->id == $book->author_id)
                selected="selected"
                @endif> {{$author->name}} </option>
            @endforeach
        </select>
    </label><br>

    <label> Publisher name:
        <select name="publisher_id">
            @foreach ($publishers as $publisher)
            <option value="{{$publisher->id}}"
                    @if( $publisher->id == $book->publisher_id)
                selected="selected"
                @endif> {{$publisher->name}} </option>
            @endforeach
        </select>
    </label><br>

    Publisher year: <input type="text" name="publish_year" value="{{$book->publish_year}}"><br>
    <input type="submit" class="submit_input" value="Edit and go back">
</form>
</div>
</body>
</html>
