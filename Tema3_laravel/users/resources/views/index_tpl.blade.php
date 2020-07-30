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
            <form action="{{ action('BookController@index') }}">
                <input type="submit" value="View books">
            </form>
        </td>
        <td>
            <form action="{{ action('BookController@create') }}">
                <input type="submit" value="Add book">
            </form>
        </td>
    </tr>
    <tr>
        <td>
            <form action="{{ action('AuthorController@index') }}">
                <input type="submit" value="View authors">
            </form>
        </td>
        <td>
            <form action="{{ action('AuthorController@create') }}">
                <input type="submit" value="Add author">
            </form>
        </td>
    </tr>
    <tr>
        <td>
            <form action="{{ action('PublisherController@index') }}">
                <input type="submit" value="View publishers">
            </form>
        </td>
        <td>
            <form action="{{ action('PublisherController@create') }}">
                <input type="submit" value="Add publisher">
            </form>
        </td>
    </tr>
</table>

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

</body>
</html>
