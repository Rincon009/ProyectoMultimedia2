{{-- resources/views/peliculas/edit.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
    <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <h1 class="mb-4 text-xl font-semibold">Editar Película: {{ $pelicula->titulo }}</h1>

            <form action="{{ route('admin.peliculas.update', $pelicula->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label for="titulo" class="block text-sm font-medium text-gray-700">Título:</label>
                    <input type="text" name="titulo" id="titulo" value="{{ $pelicula->titulo }}" required class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <div>
                    <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción:</label>
                    <textarea name="descripcion" id="descripcion" required class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ $pelicula->descripcion }}</textarea>
                </div>

                <div>
                    <label for="director" class="block text-sm font-medium text-gray-700">Director:</label>
                    <input type="text" name="director" id="director" value="{{ $pelicula->director }}" required class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <div>
                    <label for="fecha_lanzamiento" class="block text-sm font-medium text-gray-700">Fecha de Lanzamiento:</label>
                    <input type="date" name="fecha_lanzamiento" id="fecha_lanzamiento" value="{{ $pelicula->fecha_lanzamiento->format('Y-m-d') }}" required class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <div>
                    <label for="categoria_id" class="block text-sm font-medium text-gray-700">Categoría:</label>
                    <select name="categoria_id" id="categoria_id" required class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}" {{ $categoria->id == $pelicula->categoria_id ? 'selected' : '' }}>{{ $categoria->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="caratula" class="block text-sm font-medium text-gray-700">Carátula (opcional):</label>
                    <input type="file" name="caratula" id="caratula" class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="px-4 py-2 font-bold text-black bg-blue-600 rounded hover:bg-blue-700 focus:outline-none focus:shadow-outline">
                    <i class="mr-2 fas fa-save"></i>Actualizar Película
                    </button>
                    
                </div>
                <a href="{{ route('admin.peliculas.index') }}" class="px-4 py-2 text-white bg-gray-500 rounded hover:bg-gray-600">Volver</a>
            </form>
            
        </div>
    </div>
</div>
@endsection
