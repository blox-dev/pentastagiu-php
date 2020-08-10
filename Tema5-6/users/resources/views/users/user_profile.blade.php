@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{url('css/styles.css')}}">
    @auth
        <p>Yo what's up, {{Auth::user()->name}}. Wanna borrow a book?</p>

        @if(count($user_books->book))
            <b>Here are your borrowed books:</b>
            <table class="content-table">
                <tr class="content-row">
                    <th>Title</th>
                    <th>Author</th>
                    <th>Publisher</th>
                    <th>Publish year</th>
                    <th>Return date</th>
                    <th>Return book</th>
                </tr>
                @foreach($user_books->book as $book)
                <tr class="content-row">
                    <td>{{$book->title}}</td>
                    <td>{{$book->author->name}}</td>
                    <td>{{$book->publisher->name}}</td>
                    <td>{{$book->publish_year}}</td>
                    <td>{{$book->pivot->return_time}}</td>
                    <td>
                        <form method="post" action="{{action('TransactionController@delete')}}">
                            @csrf
                            <input type="hidden" id="book_id" name="book_id" value="{{$book->id}}">
                            <input type="hidden" id="user_id" name="user_id" value="{{Auth::user()->id}}">
                            <input type="submit" value="Return book">
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        @endif
        <br>
        <p>Why not borrow some @if(count($user_books->book)) more @endif books?</p> <br>
@endauth
@guest
<div class="alert alert-danger"> You must be logged in to buy a book </div> <br>
@endguest
        <p>Here are some books you could buy:</p> <br>
        <table class="content-table">
            <tr class="content-row">
                <th>ID</th>
                <th>Title</th>
                <th>Author Name</th>
                <th>Publisher Name</th>
                <th>Publish Year</th>
                <th>Created at</th>
                <th>Updated at</th>
                <th></th>
            </tr>

            @foreach( $books as $book )
            <tr class="content-row">
                <td>{{ $book->id }}</td>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author->name }}</td>
                <td>{{ $book->publisher->name }}</td>
                <td>{{ $book->publish_year }}</td>
                <td>{{ $book->created_at }}</td>
                <td>{{ $book->updated_at }}</td>
                <td>
                    @auth
                        <a href="{{url()->current().'/'.$book->id}}">View book</a>
                    @else
                        <a href="{{route('login')}}"> Login to view this book </a>
                    @endauth
                </td>
            </tr>
            @endforeach
        </table>
        {{$books->links()}}
@endsection
