@extends('layout.main')

@section('content')
    <div class="container my-5">
        <div class="card mx-auto" style="max-width: 700px;">
            @if($blog->img)
                <img src="{{ asset('storage/' . $blog->img) }}" class="card-img-top img-fluid" alt="{{ $blog->title }}"
                    style="object-fit: cover; height: 350px;">
            @endif

            <div class="card-body">
                <h1 class="card-title mb-3">{{ $blog->title }}</h1>
                <p class="card-text fs-5">{{ $blog->desc }}</p>
            </div>
        </div>
    </div>
@endsection