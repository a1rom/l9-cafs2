@extends('layout')

@section('title', 'Contact')

@section('content')
    <h1>Contact us</h1>
    <p>Phone: 123456789</p>
    <p>Email: email@email.com</p>

    <form action="/contact" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Name" value="{{ old('name') }}">
        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}">
        <textarea name="message" placeholder="Message">{{ old('message') }}</textarea>
        <button type="submit">Send</button>
    </form>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('message'))
        <div>
            {{ session('message') }}
        </div>
    @endif

    <a href="/">Back</a>
