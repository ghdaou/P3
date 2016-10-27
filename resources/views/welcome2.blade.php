@extends('layouts.master')


@section('title')
    Loreum Ipsum User Generator
@endsection


{{--
This `head` section will be yielded right before the closing </head> tag.
Use it to add specific things that *this* View needs in the head,
such as a page specific stylesheets.
--}}
@section('head')
    <link href="/css/show.css" type='text/css' rel='stylesheet'>
@endsection


@section('content')



<div class='nav'>
    <div class='buttons'>
        <form method='GET' action='/'>
        <input class='button' type='submit' value='Lorum Ipsum Generator'></br>
    </div>
    <div class='buttons'>
        <form method='GET' action='/'>
        <input class='button' type='submit' value='User Generator'></br>
    </div>
</div>


@endsection


{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')
    <script src="/js/show.js"></script>
@endsection
