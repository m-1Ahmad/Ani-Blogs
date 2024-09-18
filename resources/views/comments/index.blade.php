@extends('layouts.app')

@section('content')

<a href="{{ url()->previous() }}" class="btn btn-info float-right">Go Back</a>

<div class="jumbotron text-center mb-4" style="background: linear-gradient(135deg, #343a40, #495057); color: #f8f9fa; padding: 60px 30px; border-radius: 10px;">
    <h2>Comments for: {{ $post->title }}</h2>
    
    @if ($comments->count() > 0)
        @foreach ($comments as $comment )
            <div class="card-background-dark p-3 mb-3 text-left">
                <strong>{{ $comment->user->name ?? 'Unknown User' }}:</strong>
                <br><br><p>{{ $comment->content }}</p>
                @if ($comment->user->id == Auth::user()->id)
                    <a href="{{route('comment.edit',['post' => $post->id,'id' => $comment->id])}}" class="btn btn-warning btn-sm">Edit</a>
                    {!! Form::open(['route' => ['comment.destroy', $post->id,$comment->id], 'method' => 'POST', 'class' => 'd-inline']) !!}
                        {{ Form::hidden('_method', 'DELETE') }}
                        {{ Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) }}
                    {!! Form::close() !!}
                @endif
                <hr class="border-light">
                <small class="text-muted">Written on {{ $comment->created_at }}</small>
                <hr class="border-light">
            </div>
        @endforeach
    @else
    <p>No comments found</p>
    @endif  

    @if (!Auth::guest())
        <a href="{{ route('comment.create', $post->id) }}" class="btn btn-secondary">Add Comment</a>
    @endif
</div>

@endsection