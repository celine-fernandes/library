<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Auteurs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('books.index') }}">Bibliothèque</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('books.index') }}">Livres</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('authors.index') }}">Auteurs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('books.create') }}">Ajouter Livre</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('authors.create') }}">Ajouter Auteur</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h1>Liste des Auteurs</h1>
        <a href="{{ route('authors.create') }}" class="btn btn-primary mb-3">Ajouter un Auteur</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Biographie</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($authors as $author)
                    <tr>
                        <td>{{ $author->id }}</td>
                        <td>{{ $author->name }}</td>
                        <td>{{ $author->biography }}</td>
                        <td>
                            <a href="{{ route('authors.show', $author->id) }}" class="btn btn-info btn-sm">Voir</a>
                            <a href="{{ route('authors.edit', $author->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                            <form action="{{ route('authors.destroy', $author->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
