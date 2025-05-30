@extends('layout.main')

@section('content')
    <div class="container my-5">
        <h2 class="text-center text-primary fw-bold mb-4">Edit Blog</h2>

        <form action="{{ route('blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title', $blog->title) }}" class="form-control"
                    required>
            </div>

            <div class="mb-3">
                <label for="desc" class="form-label">Description</label>
                <textarea name="desc" id="desc" class="form-control" rows="5"
                    required>{{ old('desc', $blog->desc) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="img" class="form-label">Image (Leave blank to keep current)</label>
                <input type="file" name="img" id="img" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Update Blog</button>
        </form>
    </div>
@endsection