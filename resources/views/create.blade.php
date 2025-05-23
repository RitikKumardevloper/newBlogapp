@extends('layout.main')

@push('head')
    <style>
        body {
            background-color: #f4f6f9;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .create-blog-container {
            max-width: 700px;
            margin: 50px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .form-label {
            font-weight: 600;
        }

        .form-control:focus {
            border-color: #9393eb;
            box-shadow: 0 0 0 0.2rem rgba(147, 147, 235, 0.25);
        }

        .btn-submit {
            background-color: #9393eb;
            color: #fff;
            transition: background-color 0.3s ease;
        }

        .btn-submit:hover {
            background-color: #7d7dcd;
        }
    </style>
@endpush

@section('content')
    <div class="container create-blog-container">
        <h2 class="text-center mb-4 text-primary fw-bold">Create a New Blog</h2>
        <form action="{{route("blogs.store")}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Blog Title</label>
                <input type="text" name="title" id="title" class="form-control" required placeholder="Enter blog title">
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Blog Image</label>
                <input type="file" name="img" id="image" class="form-control" accept="image/*">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Blog Description</label>
                <textarea name="desc" id="description" rows="6" class="form-control"
                    placeholder="Write your blog content..." required></textarea>
            </div>

            <button type="submit" class="btn btn-submit w-100">Publish Blog</button>
        </form>
    </div>
@endsection