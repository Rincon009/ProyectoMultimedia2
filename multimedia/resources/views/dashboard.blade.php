@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100 flex flex-col justify-center items-center">
    <div class="text-center">
        <h1 class="text-4xl font-bold mb-8 text-gray-800">Bienvenido al Panel de Control</h1>
    </div>
    
    <div class="space-y-4 md:space-y-0 md:space-x-4 md:flex md:items-center">
        <a href="{{ route('admin.peliculas.index') }}" class="block w-64 px-6 py-4 bg-blue-600  text-gray-800 text-center rounded-lg shadow-lg hover:bg-blue-800 transform hover:scale-105 transition duration-300 ease-in-out">
            <i class="fas fa-film mb-2"></i> <!-- Icono de película -->
            <span class="text-lg font-semibold">Películas</span>
        </a>

        <a href="{{ route('admin.canciones.index') }}" class="block w-64 px-6 py-4 bg-green-600  text-gray-800 text-center rounded-lg shadow-lg hover:bg-green-800 transform hover:scale-105 transition duration-300 ease-in-out">
            <i class="fas fa-music mb-2"></i> <!-- Icono de música -->
            <span class="text-lg font-semibold">Canciones</span>
        </a>

        <!-- Botón para Crear Categoría -->
        <a href="{{ route('admin.categorias.index') }}" class="block w-64 px-6 py-4 bg-orange-500 text-gray-800 text-center rounded-lg shadow-lg hover:bg-orange-700 transform hover:scale-105 transition duration-300 ease-in-out">
            <i class="fas fa-tags mb-2"></i> <!-- Icono de categoría -->
            <span class="text-lg font-semibold">Nueva Categoría</span>
        </a>
    </div>
    
</div>

@endsection
