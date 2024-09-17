<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de l'Auteur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Détails de l'Auteur</h1>

        <div class="mb-3">
            <strong>Nom :</strong> {{ $author->name }}
        </div>
        <div class="mb-3">
            <strong>Biographie :</strong>
            <p>{{ $author->biography }}</p>
        </div>

        <a href="{{ route('authors.edit', $author->id) }}" class="btn btn-warning">Modifier</a>
        <form action="{{ route('authors.destroy', $author->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Supprimer</button>
        </form>
        <a href="{{ route('authors.index') }}" class="btn btn-secondary">Retour à la liste</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
