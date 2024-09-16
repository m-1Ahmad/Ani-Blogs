@extends('layouts.app')

@section('content')
<div class="jumbotron text-center" style="background: linear-gradient(135deg, #343a40, #495057); color: #f8f9fa; padding: 60px 30px; border-radius: 10px;">
    <h1 class="text-center mb-4" style="font-size: 2.5rem; font-weight: bold;">{{ $title }}</h1>
    <div class="row">
        @foreach($services as $service)
            <div class="col-md-4 mb-4">
                <div class="card" style="background-color: #5d5d62; color: #f8f9fa; border: 1px solid #343a40;">
                    <div class="card-body text-center">
                        <h5 class="card-title" style="font-size: 1.5rem; font-weight: bold;">{{ $service }}</h5>
                        <p class="card-text" style="color: #e0e0e0; font-size: 1rem; padding: 15px;">
                            Discover more about our {{ strtolower($service) }} services.
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
