<!doctype html>
<html lang="ro">
<head>
    <title>View {{$thing.'s'}}</title>
    <link rel="stylesheet" type="text/css" href="{{url('css/styles.css')}}">
</head>
<body>

<table>
    <tr>
        <th>View Libraries</th>
        <th>Add item</th>
    </tr>
    <tr>
        <td>
            <a href="{{action('BookController@index')}}">View books</a>
        </td>
        <td>
            <a href="{{action('BookController@create')}}">Add book</a>
        </td>
    </tr>
    <tr>
        <td>
            <a href="{{action('AuthorController@index')}}">View authors</a>
        </td>
        <td>
            <a href="{{action('AuthorController@create')}}">Add author</a>
        </td>
    </tr>
    <tr>
        <td>
            <a href="{{action('PublisherController@index')}}">View publishers</a>
        </td>
        <td>
            <a href="{{action('PublisherController@create')}}">Add publisher</a>
        </td>
    </tr>
</table>

@if(count(${$thing.'s'})!=0)
<br>
    <table>
       <tr>
           @foreach(array_keys(${$thing.'s'}[0]->toArray()) as $key)
           <th>{{str_replace('_',' ',ucfirst($key))}}</th>
           @endforeach
           <th></th><th></th>
       </tr>
            @foreach(${$thing.'s'}->toArray() as $row)
        <tr>
                @foreach($row as $key => $value)
                    <td>
                        @if ($key=='created_at' || $key == 'updated_at')
                            {{date("Y-m-d H:i:s",strtotime($value))}}
                        @else {{$value}}
                        @endif
                    </td>
                @endforeach
            <td>
                <form action="{{ action(ucfirst($thing).'Controller@edit') }}">
                    <input type="hidden" name="id" value="{{$row['id']}}">
                    <input type="submit" value="Edit {{$thing}}">
                </form>
            </td>
            <td>
                <form action="{{ action(ucfirst($thing).'Controller@delete') }}">
                    <input type="hidden" name="id" value="{{$row['id']}}">
                    <input type="submit" value="Delete {{$thing}}">
                </form>
            </td>
        </tr>
            @endforeach
    </table>
@endif

</body>
</html>
