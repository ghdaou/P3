@extends('layouts.master')


@section('title')
    Lorem Ipsum
@endsection


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

@section('body')
    <script src="/js/lipsum/show.js"></script>
@endsection
