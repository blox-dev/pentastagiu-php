@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{url('css/styles.css')}}">

<table class="content-table">
    <tr class="content-row">
        <th>View Libraries</th>
        <th>Add item</th>
    </tr>
    <tr class="content-row">
        <td>
            <a href="{{action('BookController@index')}}">View books</a>
        </td>
        <td>
            <a href="{{action('BookController@create')}}">Add book</a>
        </td>
    </tr>
    <tr class="content-row">
        <td>
            <a href="{{action('AuthorController@index')}}">View authors</a>
        </td>
        <td>
            <a href="{{action('AuthorController@create')}}">Add author</a>
        </td>
    </tr>
    <tr class="content-row">
        <td>
            <a href="{{action('PublisherController@index')}}">View publishers</a>
        </td>
        <td>
            <a href="{{action('PublisherController@create')}}">Add publisher</a>
        </td>
    </tr>
    <tr class="content-row">
        <td>
            <a href="{{action('UserController@index')}}">View users</a>
        </td>
        <td>not yet</td>
    </tr>
    <tr class="content-row">
        <td>
            <a href="{{action('TransactionController@index')}}">View transactions</a>
        </td>
        <td>not yet</td>
    </tr>
</table>

<br>

<table class="content-table">
    <tr class="content-row">
        <th>ID</th>
        <th>Name</th>
        <th>Created at</th>
        <th>Updated at</th>
        <th></th>
        <th></th>
    </tr>

    @foreach( $authors as $author )
    <tr class="content-row">
        <td>{{ $author->id }}</td>
        <td>{{ $author->name }}</td>
        <td>{{ $author->created_at }}</td>
        <td>{{ $author->updated_at }}</td>
        <td>
            <a href="{{action('AuthorController@edit').'?id='.$author->id }}">Edit author</a>
        </td>
        <td>
            <a href="{{action('AuthorController@delete').'?id='.$author->id }}">Delete author</a>
        </td>
    </tr>
    @endforeach
</table>
{{$authors->links()}}

@endsection
