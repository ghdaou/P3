@extends('layouts.master')


@section('title')
    Show book
@endsection


{{--
This `head` section will be yielded right before the closing </head> tag.
Use it to add specific things that *this* View needs in the head,
such as a page specific stylesheets.
--}}
@section('head')
    <link href="/css/books/show.css" type='text/css' rel='stylesheet'>
@endsection


@section('content')

        <h1>Lorem Ipsum Generator</h1>

        <labe>Input number of paragraphs (1 to 10)</label>
        <form method='POST' action='/lipsum'>
            {{ csrf_field() }}
            <input type='text' name='lipsum'>
            <input type='submit' value='Submit'>
        </form>

        @if(count($errors) > 0)
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

@endsection


{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')
    <script src="/js/books/show.js"></script>
@endsection
