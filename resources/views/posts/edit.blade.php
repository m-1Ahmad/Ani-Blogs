@extends('layouts.app')

@section('content')
    <a href="{{ url()->previous() }}" class="btn btn-secondary float-end">Go Back</a>
    <h1>Edit Post</h1>
    {!! Form::open(['route' => ['posts.update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="mb-3">
            {{Form::label('title', 'Title',['class' => 'form-label'])}}
            {{Form::text('title',$post->title,['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        <div class="mb-3">
            {{Form::label('body', 'Body',['class' => 'form-label'])}}
            {{Form::textarea('body',$post->body,['id'=> 'editor','class' => 'form-control', 'placeholder' => 'Body Text'])}}
        </div>
        <div class="form-group">
            {{Form::file('cover_image')}}
        </div> 
        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}

@endsection
