<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <title>singup</title>
</head>

<body>

    <div class="container my-5" style="max-width: 450px;">
        <h2 class="text-center mb-4 text-primary">Sign Up</h2>
        <form method="POST" action="{{ route('register.store') }}" enctype="multipart/form-data">

            @csrf
            <div class="mb-3">
                <label>Name</label>
                <input type="text" class="form-control" name="name" placeholder="Full Name" required>
            </div>

            <div class="mb-3">
                <label>Email Address</label>
                <input type="email" class="form-control" name="email" placeholder="Enter email" required>
            </div>

            <div class="mb-3">
                <label>Password</label>
                <input type="password" class="form-control" name="password" placeholder="Create a password" required>
            </div>

            <div class="mb-3">
                <label>Confirm Password</label>
                <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm password"
                    required>
            </div>
            <div class="mb-3">
                <label>Image</label>
                <input type="file" class="form-control" name="img" placeholder="image" />
            </div>
            <button type="submit" class="btn btn-success w-100">Sign Up</button>
            <p class="text-center mt-3">Already have an account? <a href="{{ url('/login') }}">Login</a></p>
        </form>
    </div>

</body>

</html>