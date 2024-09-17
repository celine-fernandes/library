@extends('layouts.app')

@section('title', 'Book Details')

@section('content')
    <div class="bg-white shadow-lg rounded-lg overflow-hidden mx-auto max-w-2xl">
        <!-- Book Cover Image -->
        @if ($book->image)
            <img src="{{ asset($book->image) }}" alt="Book Image" class="w-full h-112 object-cover mx-auto">
        @endif

        <div class="p-6">
            <h1 class="text-3xl font-extrabold mb-4 text-center">{{ $book->title }}</h1>
            
            <div class="mb-4">
                <strong class="text-lg font-semibold">Published Year:</strong>
                <p class="text-gray-600">{{ $book->published_year }}</p>
            </div>

            <div class="mb-4">
                <strong class="text-lg font-semibold">Description:</strong>
                <p class="text-gray-600">{{ $book->description }}</p>
            </div>

            <div class="mb-4">
                <strong class="text-lg font-semibold">Author:</strong>
                <p class="text-gray-600">{{ $book->author->name }}</p>
            </div>

            <div class="mb-4">
                <strong class="text-lg font-semibold">Categories:</strong>
                <ul class="list-disc ml-5 text-gray-600">
                    @foreach ($book->categories as $category)
                        <li>{{ $category->name }}</li>
                    @endforeach
                </ul>
            </div>

            <div class="mt-6 flex justify-center space-x-4">
                <a href="{{ route('books.edit', $book->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded-md shadow hover:bg-blue-600 transition">Edit Book</a>

                <form action="{{ route('books.destroy', $book->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this book?');" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md shadow hover:bg-red-600 transition">Delete Book</button>
                </form>

                <a href="{{ route('books.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md shadow hover:bg-gray-600 transition">Back to List</a>
            </div>
        </div>
    </div>
@endsection

