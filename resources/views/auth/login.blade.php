<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <title>login</title>
</head>

<body>



    <div class="container my-5" style="max-width: 450px;">
        <h2 class="text-center mb-4 text-primary">Login</h2>
        <form method="POST" action="{{ route('login')}}">

            @csrf
            <div class="mb-3">
                <label>Email Address</label>
                <input type="email" class="form-control" name="email" placeholder="Enter your email" required>
            </div>

            <div class="mb-3">
                <label>Password</label>
                <input type="password" class="form-control" name="password" placeholder="Enter your password" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Login</button>
            <p class="text-center mt-3">Don't have an account? <a href="{{ url('/register') }}">Sign up</a></p>
        </form>
    </div>


</body>

</html>