@extends('layouts.app')

@section('content')
<a href="{{ url()->previous() }}" class="btn btn-info float-end btn-go-back mb-3">Go Back</a>
{!! Form::open(['route' => ['comment.store',$post->id],'method' => 'POST']) !!}
@csrf
<div class="mb-3">
    <input type="hidden" name="post_id" value ="{{ $post->id }}">
    {{ Form::label('content', 'Content', ['class' => 'form-label']) }}
    <span class="text-danger">*</span>
    {{ Form::textarea('content','',['class' => 'form-control', 'placeholder' => 'Add Comment...']) }}
</div>
<span class="text-danger small">* Indicated Required Field</span><br>
{{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
    {!! Form::close() !!}
@endsection