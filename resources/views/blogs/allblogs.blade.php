@extends('layout.main')

@push('head')
    <style>
        body {
            background-color: #f4f6f9;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .blog-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: none;
            border-radius: 20px;
            overflow: hidden;
            background-color: white;
        }

        .blog-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
        }

        .blog-card img {
            height: 250px;
            object-fit: cover;
            width: 100%;
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
        }

        .blog-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #343a40;
        }

        .blog-desc {
            color: #6c757d;
            font-size: 1rem;
        }

        .read-more-btn {
            background-color: #9393eb;
            color: white;
            transition: background-color 0.3s;
            border-radius: 10px;
        }

        .read-more-btn:hover {
            background-color: #7d7dcd;
        }

        .blog-date {
            font-size: 0.85rem;
            color: #adb5bd;
        }
    </style>
@endpush

@section('content')
    <div class="container my-5">
        <div class="text-end mb-4">
            <a href="{{ route('blogs.create') }}" class="btn read-more-btn">+ Add New Blog</a>
        </div>

        <h2 class="text-center mb-5 fw-bold text-uppercase" style="color:#494ca2;">Explore All Blogs</h2>

        <div class="row justify-content-center">
            @forelse ($blogs as $blog)
                <div class="col-md-6 mb-4">
                    <div class="card blog-card h-100">
                        <img src="{{ asset('storage/' . $blog->img) }}" alt="Blog Image">
                        <div class="card-body d-flex flex-column">
                            <div class="blog-title mb-2">{{ $blog->title }}</div>
                            <p class="blog-desc">{{ \Illuminate\Support\Str::limit($blog->desc, 120) }}</p>
                            <div class="mt-auto">
                                <p class="blog-date">Posted on {{ $blog->created_at->format('F d, Y') }}</p>
                                <a href="{{ route('blogs.show', $blog->id) }}" class="btn read-more-btn mt-2 w-100">Read
                                    More</a>
                            </div>
                        </div>
                    </div>
                </div>

            @empty
                <p class="text-center">No blogs available yet.</p>
            @endforelse
            <div class="mt-4 d-flex justify-content-center">
                {{ $blogs->links() }}
            </div>

        </div>

    </div>
@endsection