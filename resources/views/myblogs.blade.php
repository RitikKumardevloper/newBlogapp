@extends('layout.main')
@push('head')
    <style>
        .read-more-btn {
            background-color: #9393eb;
            color: white;
            transition: background-color 0.3s;
            border-radius: 10px;
        }

        .read-more-btn:hover {
            background-color: #7d7dcd;
        }
    </style>
@endpush



@section('content')
    <div class="container my-5">
        <div class="text-end mb-4">
            <a href="{{ url('/blogs/create') }}" class="btn read-more-btn">+ Add New Blog</a>
        </div>
        <h2 class="text-center text-primary fw-bold mb-4">My Blogs</h2>

        @foreach ($blogs as $blog)
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <h4 class="card-title">{{ $blog->title }}</h4>
                    <p class="text-muted">{{ $blog->created_at->format('M d, Y') }}</p>
                    <p class="card-text">{{ \Illuminate\Support\Str::limit($blog->desc, 150) }}</p>

                    <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-sm btn-warning">Edit</a>

                    <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" class="d-inline"
                        onsubmit="return confirm('Are you sure you want to delete this blog?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach

        @if($blogs->isEmpty())
            <p class="text-center text-muted">You haven't created any blogs yet.</p>
        @endif
    </div>
@endsection