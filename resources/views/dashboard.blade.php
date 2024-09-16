@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-light shadow-sm">
                <div class="card-header bg-dark text-light">Dashboard</div>
                <div class="card-body">
                    <div class="d-flex justify-content-center mb-3">
                        <a href="/posts/create" class="btn btn-primary">Create Post</a>
                    </div>
                    <h3 class="text-light">Your Blog Posts</h3>
                    @if(count($posts) > 0)
                        <table class="table table-dark table-striped">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($posts as $post)
                                <tr>
                                    <td class="text-light">{{$post->title}}</td>
                                    <td>
                                        <a href="/posts/{{$post->id}}/edit" class="btn btn-warning">Edit</a>
                                    </td>
                                    <td>
                                        {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'POST', 'class' => 'd-inline']) !!}
                                            {{ Form::hidden('_method', 'DELETE') }}
                                            {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class="text-light">You have no Blogs.</p>
                    @endif
                    
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
