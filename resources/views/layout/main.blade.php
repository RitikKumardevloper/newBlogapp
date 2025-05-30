<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Blog App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous" />
    @stack('head')
    <style>
        #main-nav {
            background-color: rgb(160, 119, 254);
            min-height: 80px;
        }

        #nav-logo {
            font-size: 1.75rem;
            font-weight: bold;
            color: white;
        }

        .nav-link {
            color: white !important;
            font-size: 1rem;
        }

        #profile-img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: .5rem;
        }
    </style>
</head>

<body>
    <nav id="main-nav" class="navbar navbar-expand-lg">
        <div class="container">
            <a id="nav-logo" class="navbar-brand" href="{{ url('/') }}">
                BlogApp
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu"
                aria-controls="navMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navMenu">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">All Blogs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/myblogs') }}">My Blogs</a>
                    </li>
                </ul>

                <div class="d-flex align-items-center">
                    @auth
                                    <img id="profile-img" src="{{ Auth::user()->img
                        ? asset('storage/' . Auth::user()->img)
                        : 'https://via.placeholder.com/40' }}" alt="Profile Image" />
                                    <a class="nav-link" href="{{ route('profile.show') }}">
                                        {{ Auth::user()->name }}
                                    </a>
                    @else
                        <img id="profile-img" src="https://via.placeholder.com/40" alt="Default Avatar" />
                        <a class="nav-link" href="{{ route('login.form') }}">
                            Login
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    @yield('content')

    {{--
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6keyq49JZ2zP+XEMK9NhE3MnT1+UaVQsELTnNNP54E9U0lzT6yR"
        crossorigin="anonymous"></script> --}}
    @stack('scripts')

</body>

</html>