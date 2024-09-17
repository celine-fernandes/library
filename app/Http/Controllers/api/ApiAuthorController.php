<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;

class ApiAuthorController extends Controller
{

    public function indexApi()
    {
        $authors = Author::all();
        return response()->json($authors);
    }

    public function storeApi(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'biography' => 'nullable|string',
        ]);

        $author = Author::create($request->all());

        return response()->json([
            'message' => 'Auteur créé avec succès.',
            'author' => $author,
        ], 201); 
    }

    public function showApi(Author $author)
    {
        return response()->json($author);
    }

    public function updateApi(Request $request, Author $author)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'biography' => 'nullable|string',
        ]);

        $author->update($request->all());

        return response()->json([
            'message' => 'Auteur mis à jour avec succès.',
            'author' => $author,
        ]);
    }
    
    public function destroyApi(Author $author)
    {
        $author->delete();

        return response()->json([
            'message' => 'Auteur supprimé avec succès.',
        ]);
    }
}
