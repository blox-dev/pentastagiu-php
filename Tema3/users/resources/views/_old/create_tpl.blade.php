<html>
    <head>
        <title>Create {{$thing}}</title>
        <link rel="stylesheet" type="text/css" href="{{url('css/styles.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('css/bootstrap.css')}}">
    </head>
    <body>
        <h3 class="alert alert-danger"> Insert {{$thing}} details </h3>
        <div>
            <form action="{{ action(ucfirst($thing).'Controller@store') }}" method="POST">
                @csrf
@if (isset($text_input))
    @foreach($text_input as $name)
        <label for="{{$name}}">{{str_replace('_',' ',ucfirst($name))}}:</label><input type="text" id="{{$name}}" name="{{$name}}"><br>
    @endforeach
@endif


@if (isset($option_input))
            @foreach ($option_input as $key => $options)
            <label> {{substr(ucfirst($key),0,-1)}} name:
                <select name="{{substr($key,0,-1)}}_id">
                    @foreach ($options as $option)
                    <option value="{{$option->id}}"> {{$option->name}} </option>
                    @endforeach
                    </select>
                </label>
            @endforeach
@endif
                <input type="submit" class="submit_input" value="Add {{$thing}}">
            </form>
    </div>
    </body>
</html>
