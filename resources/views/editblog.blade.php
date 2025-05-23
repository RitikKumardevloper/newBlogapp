@extends('layout.main')

@section('content')
    <div class="container my-5">
        <h2 class="text-center text-primary fw-bold mb-4">Edit Blog</h2>

        <form action="{{ route('blogs.update', $blog->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title', $blog->title) }}" class="form-control"
                    required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="desc" id="description" class="form-control" rows="5"
                    required>{{ old('description', $blog->desc) }}</textarea>
            </div>

            <!-- Add more fields as needed -->

            <button type="submit" class="btn btn-primary">Update Blog</button>
        </form>
    </div>
@endsection