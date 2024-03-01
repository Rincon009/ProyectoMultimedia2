{{-- resources/views/peliculas/edit.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <h1 class="text-xl font-semibold mb-4">Editar Película: {{ $pelicula->titulo }}</h1>

            <form action="{{ route('peliculas.update', $pelicula->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label for="titulo" class="block font-medium text-sm text-gray-700">Título:</label>
                    <input type="text" name="titulo" id="titulo" value="{{ $pelicula->titulo }}" required class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <div>
                    <label for="descripcion" class="block font-medium text-sm text-gray-700">Descripción:</label>
                    <textarea name="descripcion" id="descripcion" required class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ $pelicula->descripcion }}</textarea>
                </div>

                <div>
                    <label for="director" class="block font-medium text-sm text-gray-700">Director:</label>
                    <input type="text" name="director" id="director" value="{{ $pelicula->director }}" required class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <div>
                    <label for="fecha_lanzamiento" class="block font-medium text-sm text-gray-700">Fecha de Lanzamiento:</label>
                    <input type="date" name="fecha_lanzamiento" id="fecha_lanzamiento" value="{{ $pelicula->fecha_lanzamiento->format('Y-m-d') }}" required class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <div>
                    <label for="categoria_id" class="block font-medium text-sm text-gray-700">Categoría:</label>
                    <select name="categoria_id" id="categoria_id" required class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}" {{ $categoria->id == $pelicula->categoria_id ? 'selected' : '' }}>{{ $categoria->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="caratula" class="block font-medium text-sm text-gray-700">Carátula (opcional):</label>
                    <input type="file" name="caratula" id="caratula" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white font-bold rounded-md">
                        Actualizar Película
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
