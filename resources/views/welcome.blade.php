@extends('layouts.master')

@section('title')
    Developper's Best Friend
@endsection

@section('head')
    <link href="/css/show.css" type='text/css' rel='stylesheet'>
@endsection

@section('content')

    <p>This application generates Lorem Ipsum text and user/s data.
    A visitor to the application is required to input the number of
    Lorem Ipsum paragraphs to be generated and displayed.
    Also required is the number of users to be generated and
    if selected birth date and profile are displayed </p>

    <h2>Lorem Ipsum Generator</h2>

    <labe>Input number of paragraphs (1 to 10)</label>
    <form method='POST' action='/'>
        {{ csrf_field() }}
        <input type='text' name='lipsum'></br></br>
        <input type='submit' value='Submit'>
    </form>

    </br></br>

    <h2>User Generator</h2>

    <labe>Input Number of Users to Display (1 to 10)</label>
    <form method='POST' action='/user'>
        {{ csrf_field() }}
        <input type='text' name='user'></br></br>
        <labe>Display User's Birth Date </label></br>
        <input type='checkbox' name='birthdate'></br></br>
        <labe>Display User's Profile </label></br>
        <input type='checkbox' name='profile'></br></br>
        <input type='submit' value='Submit'></br>
    </form>

    @if(count($errors) > 0)
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    </br>

    <a href="/contact"> Contact Us </a>

@endsection

@section('body')
    <script src="/js/show.js"></script>
@endsection
