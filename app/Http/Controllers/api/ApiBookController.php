<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Http\Request;

class ApiBookController extends Controller
{
    public function index()
    {
        $books = Book::with(['author', 'categories'])->paginate(18);
        return response()->json($books);
    }

    public function show($id)
    {
        $book = Book::with(['author', 'categories'])->findOrFail($id);
        return response()->json($book);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'published_year' => 'required|integer',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'author_name' => 'required|string|max:255',
            'categories' => 'nullable|array',
        ]);

        $author = Author::firstOrCreate(['name' => $validatedData['author_name']]);

        $book = new Book($validatedData);
        $book->author()->associate($author);
        $book->save();

        $book->categories()->attach($request->categories);

        $this->storeImage($request, $book);

        return response()->json(['message' => 'Book created successfully.', 'book' => $book], 201);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'nullable|string|max:255',
            'published_year' => 'nullable|integer',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'author_name' => 'nullable|string|max:255',
            'categories' => 'nullable|array',
            'categories.*' => 'exists:categories,id',
        ]);
    
        $book = Book::findOrFail($id);
    
        if (array_key_exists('author_name', $validatedData) && $validatedData['author_name']) {
            $author = Author::firstOrCreate(['name' => $validatedData['author_name']]);
            $book->author()->associate($author);
        }
    
        $book->update($validatedData);
        $book->save();
        
    
        if ($request->has('categories')) {
            $book->categories()->sync($request->categories);
        }
    
        $this->storeImage($request, $book);
    
    return response()->json(['message' => 'Book updated successfully.', 'book' => $book]);
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return response()->json(['message' => 'Book deleted successfully.']);
    }

    private function storeImage(Request $request, Book $book)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = $image->storeAs('images', $imageName, 'public');
            $book->image = 'storage/images/' . $imageName;
            $book->save();
        }
    }
}
