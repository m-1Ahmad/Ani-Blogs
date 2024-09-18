@extends('layouts.app')

@section('content')
    <a href="/posts" class="btn btn-info float-end btn-go-back">Go Back</a>
    <h1 class="post-title">{{ $post->title }}</h1>
    <img class="img-fluid post-image" style=" border-radius: 20px" src="/storage/cover_images/{{ $post->cover_image }}" alt="Cover Image">
    <br><br>
    <h3 class="text-white">Introduction:</h3>
    <div class="post-content">
        {!! $post->body !!}
    </div>
    <hr class="border-light">
    <small class="post-meta">Written on {{ $post->created_at }} by {{ $post->user->name }}</small>
    <hr class="border-light">
    <a href="/posts/{{ $post->id }}/comment" class="btn btn-info">Comment</a>
    @if (!Auth::guest())
        @if (Auth::user()->id == $post->user->id)
            <div class="d-flex justify-content-between mt-4">
                <a href="/posts/{{ $post->id }}/edit" class="btn btn-warning">Edit</a>
                {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'POST', 'class' => 'd-inline']) !!}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                {!! Form::close() !!}
            </div>
        @endif
    @endif
@endsection
