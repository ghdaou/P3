@extends('layouts.master')


@section('title')
    Lorem Ipsum
@endsection


{{--
This `head` section will be yielded right before the closing </head> tag.
Use it to add specific things that *this* View needs in the head,
such as a page specific stylesheets.
--}}
@section('head')
    <link href="/css/lipsum/show.css" type='text/css' rel='stylesheet'>
@endsection


@section('content')

    @if(count($errors) > 0)
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif



    <h1>Lorem Ipsum</h1>

    <a href="/">Generate More Lorem Ipsum</a> </br>

    <div class='lipsum'>{!! $paragraphs !!} </div>




@endsection


{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')
    <script src="/js/lipsum/show.js"></script>
@endsection
