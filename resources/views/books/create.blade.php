@extends('layouts.app')

@section('title', 'Create Book')

@section('content')
    <div class="bg-white shadow-lg rounded-lg overflow-hidden mx-auto max-w-2xl p-6">
        <h1 class="text-3xl font-extrabold mb-6 text-center">Create New Book</h1>
        
        <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="title" class="block text-lg font-semibold mb-2">Title:</label>
                <input type="text" name="title" id="title" required class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 p-2">
            </div>

            <div class="mb-4">
                <label for="published_year" class="block text-lg font-semibold mb-2">Published Year:</label>
                <input type="number" name="published_year" id="published_year" required class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 p-2">
            </div>

            <div class="mb-4">
                <label for="description" class="block text-lg font-semibold mb-2">Description:</label>
                <textarea name="description" id="description" class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 p-2"></textarea>
            </div>

            <div class="mb-4">
                <label for="image" class="block text-lg font-semibold mb-2">Image:</label>
                <input type="file" name="image" id="image" class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 p-2">
            </div>

            <div class="mb-4">
                <label for="author_name" class="block text-lg font-semibold mb-2">Author Name:</label>
                <input type="text" name="author_name" id="author_name" required class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 p-2">
            </div>

            <div class="mb-4">
                <label for="categories" class="block text-lg font-semibold mb-2">Categories:</label>
                <select name="categories[]" id="categories" multiple class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 p-2">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex justify-center">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md shadow hover:bg-blue-600 transition">Submit</button>
            </div>
        </form>
    </div>
@endsection
