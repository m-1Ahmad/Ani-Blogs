@extends('layouts.app')

@section('content')    
    <div class="jumbotron text-center" style="background: linear-gradient(135deg, #343a40, #495057); color: #f8f9fa; padding: 60px 30px; border-radius: 10px;">
        @if (Auth::check())
            <h1 class="display-4">Welcome back, {{ Auth::user()->name }}!</h1>
            <p class="lead">We’re glad to have you here. Head over to your dashboard to continue where you left off.</p>
            <a href="{{ route('dashboard') }}" class="btn btn-info btn-outline-light btn-lg mt-4 px-5">Go to Dashboard</a>
        @else
            <h1 class="display-4">Welcome to Ani Blogs!</h1>
            <p class="lead">Explore a world of engaging stories and articles about Anime. Click Register/Login to Join us to share your voice and connect with a vibrant community.</p>
            {{-- <p class="mt-4">
                <a class="btn btn-primary btn-lg mx-2 px-5" href="/login" role="button">Login</a>
                <a class="btn btn-success btn-lg mx-2 px-5" href="/register" role="button">Register</a>
            </p> --}}
        @endif           
    </div>
@endsection
