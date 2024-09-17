@extends('layouts.app')

@section('title', 'Edit Book')

@section('content')
    <div class="bg-white shadow-lg rounded-lg overflow-hidden mx-auto max-w-2xl p-6">
        <h1 class="text-3xl font-extrabold mb-6 text-center">Edit Book</h1>

        <form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Champ pour le titre -->
            <div class="mb-4">
                <label for="title" class="block text-lg font-semibold mb-2">Title</label>
                <input type="text" name="title" value="{{ old('title', $book->title) }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Champ pour l'année de publication -->
            <div class="mb-4">
                <label for="published_year" class="block text-lg font-semibold mb-2">Published Year</label>
                <input type="number" name="published_year" value="{{ old('published_year', $book->published_year) }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('published_year')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Champ pour l'auteur -->
            <div class="mb-4">
                <label for="author_name" class="block text-lg font-semibold mb-2">Author</label>
                <input type="text" name="author_name" value="{{ old('author_name', $book->author->name) }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('author_name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Champ pour la description -->
            <div class="mb-4">
                <label for="description" class="block text-lg font-semibold mb-2">Description</label>
                <textarea name="description" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description', $book->description) }}</textarea>
                @error('description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Gestion des catégories -->
            <div class="mb-4">
                <label for="categories" class="block text-lg font-semibold mb-2">Categories</label>
                <select name="categories[]" multiple class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" 
                            {{ in_array($category->id, old('categories', $book->categories->pluck('id')->toArray())) ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('categories')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Champ pour l'image -->
            <div class="mb-4">
                <label for="image" class="block text-lg font-semibold mb-2">Upload New Image</label>
                <input type="file" name="image" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('image')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Afficher l'image actuelle si elle existe -->
            @if ($book->image)
                <div class="mb-4">
                    <img src="{{ asset($book->image) }}" alt="Current Image" class="w-32 h-auto mx-auto">
                </div>
            @endif

            <div class="flex justify-center space-x-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md shadow hover:bg-blue-600 transition">Update Book</button>
                <a href="{{ route('books.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md shadow hover:bg-gray-600 transition">Cancel</a>
            </div>
        </form>
    </div>
@endsection
