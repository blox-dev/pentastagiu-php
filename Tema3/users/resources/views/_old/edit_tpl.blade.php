<html>
<head>
    <title>Edit {{$thing}}</title>
    <link rel="stylesheet" type="text/css" href="{{url('css/styles.css')}}">
</head>
<body>
<h3> Edit {{$thing}} details </h3>

<div>
    <form action="{{ action(ucfirst($thing).'Controller@update') }}" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{${$thing}->id}}">

        @if (isset($text_input))
        @foreach($text_input as $name)
        <label for="{{$name}}">{{str_replace('_',' ',ucfirst($name))}}:</label>
        <input type="text" id="{{$name}}" name="{{$name}}"
               value="{{ ${$thing}->{$name} }}"><br>
        @endforeach
        @endif


        @if (isset($option_input))
        @foreach ($option_input as $key => $options)
        <label> {{substr(ucfirst($key),0,-1)}} name:
            <select name="{{substr($key,0,-1)}}_id">
                @foreach ($options as $option)
                <option value="{{$option->id}}"
                    @if($option->id == ${$thing}->{substr($key,0,-1).'_id'})
                        selected="selected"
                    @endif> {{$option->name}}</option>
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
