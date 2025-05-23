@extends('layout.main')

@section('content')
    <div class="container my-5">
        <div class="card p-4 shadow">
            <h3 class="mb-3">Profile</h3>
            <div class="d-flex align-items-center gap-3 mb-4">
                <img src="{{ Auth::user()->img ? asset('storage/' . Auth::user()->img) : 'https://via.placeholder.com/100' }}"
                    alt="Profile" class="rounded-circle" style="width: 100px; height: 100px; object-fit: cover;">
                <div>
                    <p><strong>Name:</strong> {{ Auth::user()->name }}</p>
                    <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                </div>
            </div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="btn btn-danger">Logout</button>
            </form>
        </div>
    </div>
@endsection