<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Livres</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .book-card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: 0.3s;
            border-radius: 10px;
            overflow: hidden;
            margin-bottom: 20px;
            height: 90%;
        }

        .book-card:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .book-image {
            height: 350px;
            object-fit: cover;
            border-bottom: 1px solid #ddd;
        }

        .book-info {
            padding: 10px;
        }

        .book-title {
            font-size: 1.4rem;
            font-weight: bold;
        }

        .book-author {
            font-size: 1rem;
            color: #6c757d;
        }

        .book-details {
            font-size: 0.9rem;
            color: #888;
        }

        .col-md-4 {
            max-width: 220px;
        }

        .row {
            justify-content: center;
        }

        .hero {
            background-image: url('images/alfons-morales-YLSwjSy7stw-unsplash-1024x600.jpg');
            background-size: cover;
            background-position: center;
            height: 500px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-align: center;
            position: relative;
        }

        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* Superpose une couche sombre */
        }

        .hero-content {
            z-index: 1;
        }

        .hero-title {
            font-size: 3rem;
            font-weight: bold;
        }

        .hero-subtitle {
            font-size: 1.5rem;
        }

        .navbar {
            background-color: #000000;
        }

        .navbar-nav .nav-link {
            color: white;
            font-weight: 500;
        }

        .navbar-nav .nav-link:hover {
            color: #f8f9fa;
        }

        /* Pagination Customization */
        .pagination {
            font-size: 0.875rem;
            padding: 5px;
        }

        .pagination .page-item .page-link {
            border-radius: 50%;
            padding: 0.25rem 0.75rem;
        }

        .pagination .page-item.active .page-link {
            background-color: #007bff;
            color: white;
            border-color: #007bff;
        }

        .pagination .page-link {
            color: #007bff;
            border: 1px solid #ddd;
        }

        .pagination .page-link:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('books.index') }}">Bibliothèque</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
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
    </nav>

    <!-- Hero Section -->
    <div class="hero">
        <div class="hero-overlay"></div> 
        <div class="hero-content">
            <h1 class="hero-title">Bienvenue à la Bibliothèque</h1>
            <p class="hero-subtitle">Découvrez notre collection de livres</p>
        </div>
    </div>

    <!-- Liste des Livres -->
    <div class="container mt-5">
        @if($books->count())
            <div class="row">
                <!-- Parcourir les livres et les afficher sous forme de cartes -->
                @foreach($books as $book)
                    <div class="col-md-4">
                        <!-- Lien vers la page du livre -->
                        <a href="{{ route('books.show', $book->id) }}" class="text-decoration-none text-dark">
                            <div class="card book-card">
                                <img src="{{ asset($book->image) }}" class="card-img-top book-image" alt="Image de {{ $book->title }}">
                                <div class="card-body book-info">
                                    <h5 class="book-title">{{ $book->title }}</h5>
                                    <p class="book-author">{{ $book->author->name }}</p>
                                    <p class="book-details">{{ $book->genre }} | {{ $book->published_year }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center mt-4">
                {{ $books->onEachSide(1)->links('pagination::bootstrap-4') }}
            </div>            
        @else
            <p>Aucun livre trouvé.</p>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
