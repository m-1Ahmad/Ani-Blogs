@extends('layouts.app')

@section('content')
<div class="jumbotron text-center about-section" style="background: linear-gradient(135deg, #343a40, #495057); color: #f8f9fa; padding: 60px 30px; border-radius: 10px;">
    <div class="profile-image-container">
        <img src="https://avatars.githubusercontent.com/u/149201186?s=400&u=7c32d0145ad08cc611f2b0186f36b68eb0d886c9&v=4" alt="Profile Image" class="profile-image">
    </div>
    <h1 class="text-center mb-4">{{ $title }}</h1>

    

    <p class="text-center lead">
        I am passionate about web development and data science. My journey in tech started with a desire to build 
        meaningful projects and solve real-world problems using technology. I enjoy working with Laravel and Python, 
        constantly expanding my skill set to develop efficient solutions. This blog is a place where I share my knowledge 
        and learn from the community.
    </p>

    <div class="text-center">
        <h4>Connect with me:</h4>
        <a href="https://github.com/m-1Ahmad" class="btn btn-outline-light btn-lg" target="_blank">
            <i class="fab fa-github"></i> GitHub
        </a>
        <a href="https://linkedin.com/in/muhammad-ahmad-20ma" class="btn btn-outline-light btn-lg" target="_blank">
            <i class="fab fa-linkedin"></i> LinkedIn
        </a>
    </div>
</div>
@endsection
