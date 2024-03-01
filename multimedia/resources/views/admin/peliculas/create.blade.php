{{-- resources/views/peliculas/create.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
    <div class="overflow-hidden bg-white shadow sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <h1 class="mb-4 text-xl font-semibold text-gray-800">Añadir Nueva Película</h1>

            {{-- Bloque para mostrar mensajes de error de validación --}}
            @if ($errors->any())
            <div class="mb-4">
                <div class="font-medium text-red-600">{{ __('No ha sido posible crear la Película.') }}</div>

                <ul class="mt-3 text-sm text-red-600 list-disc list-inside">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('admin.peliculas.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <div>
                    <label for="titulo" class="block text-sm font-medium text-gray-700">Título:</label>
                    <input type="text" name="titulo" id="titulo" required class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <div>
                    <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción:</label>
                    <textarea name="descripcion" id="descripcion" required class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                </div>

                <div>
                    <label for="director" class="block text-sm font-medium text-gray-700">Director:</label>
                    <input type="text" name="director" id="director" required class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <div>
                    <label for="fecha_lanzamiento" class="block text-sm font-medium text-gray-700">Fecha de Lanzamiento:</label>
                    <input type="date" name="fecha_lanzamiento" id="fecha_lanzamiento" required class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <div>
                    <label for="categoria_id" class="block text-sm font-medium text-gray-700">Categoría:</label>
                    <select name="categoria_id" id="categoria_id" class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="caratula" class="block text-sm font-medium text-gray-700">Carátula:</label>
                    <input type="file" name="caratula" id="caratula" required class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                <div>
                    <label for="movie_path" class="block text-sm font-medium text-gray-700">Archivo de la Película:</label>
                    <input type="file" name="movie_path" id="movie_path" required class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                
                <br>
                <div class="flex justify-end mt-6">
                    <button type="submit" class="px-4 py-2 font-bold text-black bg-blue-600 rounded hover:bg-blue-700 focus:outline-none focus:shadow-outline">
                        <i class="mr-2 fas fa-save"></i> Guardar Película
                    </button>
                </div>
                <a href="{{ route('admin.peliculas.index') }}" class="px-4 py-2 text-white bg-gray-500 rounded hover:bg-gray-600">Volver</a>
               
            </form>
        </div>
    </div>
</div>
@endsection