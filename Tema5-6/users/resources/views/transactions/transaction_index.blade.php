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
        <th>Book title</th>
        <th>Transaction time</th>
        <th>Return time</th>
    </tr>
    @foreach( $transactions as $transaction )
    <tr class="content-row">
        <td>{{ $transaction->id }}</td>
        <td>{{ $transaction->user->name }}</td>
        <td>{{ $transaction->book->title }}</td>
        <td>{{ $transaction->transaction_time }}</td>
        <td>{{ $transaction->return_time }}</td>
    </tr>
    @endforeach
</table>
{{$transactions->links()}}

@endsection
