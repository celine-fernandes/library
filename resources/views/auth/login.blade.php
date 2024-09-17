@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="bg-white shadow-lg rounded-lg overflow-hidden mx-auto max-w-md p-6">
        <h1 class="text-3xl font-extrabold mb-6 text-center">Login</h1>

        @if(session('error'))
            <div class="text-red-500 mb-4 text-center">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="email" class="block text-lg font-semibold mb-2">Email:</label>
                <input type="email" name="email" id="email" required class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 p-2">
            </div>

            <div class="mb-4">
                <label for="password" class="block text-lg font-semibold mb-2">Password:</label>
                <input type="password" name="password" id="password" required class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 p-2">
            </div>

            <div class="flex justify-center">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md shadow hover:bg-blue-600 transition">Login</button>
            </div>
        </form>

        <div class="mt-4 text-center">
            <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Don't have an account? Register</a>
        </div>
    </div>
@endsection
