@extends('layouts.master')


@section('title')
    User Generator
@endsection


@section('head')
    <link href="/css/users/show.css" type='text/css' rel='stylesheet'>
@endsection


@section('content')

    @if(count($errors) > 0)
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <h1>Users</h1>

    <a href="/">Generate More Users</a></br>

    <div class='users'> {!! $users !!} </div>


@endsection

@section('body')
    <script src="/js/users/show.js"></script>
@endsection
