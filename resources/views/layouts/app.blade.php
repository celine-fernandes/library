<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Application')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar {
            background-color: #343a40; 
        }

        .navbar-brand {
            color: white;
            font-weight: bold;
            font-size: 1.5rem;
        }

        .navbar-brand:hover {
            color: #f8f9fa; 
        }

        .navbar-nav .nav-link {
            color: white;
            font-weight: 500;
        }

        .navbar-nav .nav-link:hover {
            color: #f8f9fa; 
        }

        .nav-item + .nav-item {
            margin-left: 15px; 
        }

        .navbar-nav {
            align-items: center;
        }
        .container {
            max-width: 600px; 
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('books.index') }}">Bibliothèque</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="ms-auto">
                    <ul class="navbar-nav">
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('books.index') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('books.create') }}">Add Book</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('authors.index') }}">Authors</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" 
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                                </a>
                            </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        @endauth
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Login</a>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
