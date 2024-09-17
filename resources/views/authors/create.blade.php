@extends('layouts.app')

@section('title', 'Ajouter un Auteur')

@section('content')
    <div class="bg-white shadow-lg rounded-lg overflow-hidden mx-auto max-w-2xl p-6">
        <h1 class="text-3xl font-extrabold mb-6 text-center">Ajouter un Auteur</h1>

        <form action="{{ route('authors.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-lg font-semibold mb-2">Nom:</label>
                <input type="text" name="name" id="name" required class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 p-2">
            </div>

            <div class="mb-4">
                <label for="biography" class="block text-lg font-semibold mb-2">Biographie:</label>
                <textarea name="biography" id="biography" class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 p-2"></textarea>
            </div>

            <div class="flex justify-center">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md shadow hover:bg-blue-600 transition">Enregistrer</button>
            </div>
        </form>
    </div>
@endsection
