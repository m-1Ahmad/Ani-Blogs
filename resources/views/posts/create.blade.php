@extends('layouts.app')

@section('content')
    <a href="{{ url()->previous() }}" class="btn btn-secondary float-end btn-go-back">Go Back</a>
    <h1>Create Post</h1>
    {!! Form::open(['route' => 'posts.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="mb-3">
            {{ Form::label('title', 'Title', ['class' => 'form-label']) }}
            {{ Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title']) }}
        </div>
        <div class="mb-3">
            {{ Form::label('body', 'Body', ['class' => 'form-label']) }}
            {{ Form::textarea('body', '', ['id'=> 'editor', 'class' => 'form-control', 'placeholder' => 'Body Text']) }}
        </div>
        <div class="form-group">
            {{ Form::file('cover_image', ['class' => 'form-control-file']) }}
        </div>
        {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
    {!! Form::close() !!}

@endsection
