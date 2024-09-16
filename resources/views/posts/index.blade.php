@extends('layouts.app')

@section('content')
    <div class="posts-page">
        @if(!Auth::guest())
            <a href="/posts/create" class="btn btn-primary float-right mb-3">Create Post</a>
        @endif
        <h1 class="text-light">Posts:</h1>
        @if(count($post) > 0)
            @foreach($post as $item)
                <div class="card p-3 mb-3">
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <img style="width:100%" src="/storage/cover_images/{{$item->cover_image}}">
                        </div>
                        <div class="col-md-8 col-sm-4">
                            <h3><a href='/posts/{{$item->id}}' class="text-light">{{$item->title}}</a></h3>
                            <small class="text-muted">Written on {{$item->created_at}} by {{$item->user->name}}</small>
                        </div>
                    </div>
                </div>
            @endforeach
            {{$post->links()}}
        @else
            <p class="text-light">No Post Found</p>    
        @endif
    </div>
@endsection
