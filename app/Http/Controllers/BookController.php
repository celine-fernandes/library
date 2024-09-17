<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the books.
     */
    public function index()
    {
        $books = Book::with(['author', 'categories'])->paginate(18);
    
        return view('homepage', compact('books'));
    }
    

    /**
     * Show the form for creating a new book.
     */
    public function create()
    {
        $authors = Author::all();
        $categories = Category::all();

        return view('books.create', compact('authors', 'categories'));
    }

    /**
     * Store a newly created book in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'published_year' => 'required|integer',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'author_name' => 'required|string|max:255', 
            'categories' => 'required|array',
            'categories.*' => 'exists:categories,id',
        ]);
    
        $author = Author::firstOrCreate(['name' => $validatedData['author_name']]);
    
        $book = new Book($validatedData);
        $book->author()->associate($author);  
        $book->save();
        $book->categories()->attach($request->categories);
        $this->storeImage($request, $book);
    
        return redirect()->route('books.index')->with('success', 'Book and Author created successfully.');
    }
    
    private function storeImage(Request $request, Book $book)
    {
        if (request()->hasFile('image')) {
            $image = request()->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName(); 
            $imagePath = $image->storeAs('images', $imageName, 'public'); 
            $book->image = 'storage/images/' . $imageName; 
            $book->save();
        }
    }
    
    
    
    public function edit($id)
{

    $book = Book::with('author')->find($id);
    
    $categories = Category::all();
    
    return view('books.edit', [
        'book' => $book,
        'categories' => $categories,
        'author' => $book->author, 
    ]);
}


public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'title' => 'nullable|string|max:255',
        'published_year' => 'nullable|integer',
        'description' => 'nullable|string',
        'image' => 'nullable|image|max:2048',
        'author_name' => 'nullable|string|max:255', 
        'categories' => 'nullable |array',
        'categories.*' => 'exists:categories,id',
    ]);

    $book = Book::find($id);

    $author = Author::firstOrCreate(['name' => $validatedData['author_name']]);
    
    $book->update($validatedData);
    $book->author()->associate($author);
    $book->save();
    $book->categories()->sync($request->categories);
    $this->storeImage($request, $book);
    return redirect()->route('books.index')->with('success', 'Book updated successfully.');
}

    

public function show($id)
{

    $book = Book::with(['author', 'categories'])->findOrFail($id);
    return view('books.show', [
        'book' => $book,
    ]);
}


public function destroy($id)
{
    // Récupérer le livre par son id //cest quoi findorfail//
    $book = Book::findOrFail($id);

    // Supprimer le livre
    $book->delete();

    // Rediriger vers la liste des livres avec un message de succès
    return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
}

}
