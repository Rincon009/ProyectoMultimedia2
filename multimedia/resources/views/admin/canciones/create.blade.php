{{-- resources/views/admin/canciones/create.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
    <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <h1 class="mb-4 text-xl font-semibold">Añadir Nueva Canción</h1>

            {{-- Bloque para mostrar mensajes de error de validación --}}
            @if ($errors->any())
            <div class="mb-4">
                <div class="font-medium text-red-600">{{ __('Whoops! Something went wrong.') }}</div>

                <ul class="mt-3 text-sm text-red-600 list-disc list-inside">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('admin.canciones.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <div>
                    <label for="titulo" class="block text-sm font-medium text-gray-700">Título:</label>
                    <input type="text" name="titulo" id="titulo" required class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <div>
                    <label for="artista" class="block text-sm font-medium text-gray-700">Artista:</label>
                    <input type="text" name="artista" id="artista" required class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <div>
                    <label for="album" class="block text-sm font-medium text-gray-700">Álbum (opcional):</label>
                    <input type="text" name="album" id="album" class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <div>
                    <label for="anio" class="block text-sm font-medium text-gray-700">Año:</label>
                    <input type="number" name="anio" id="anio" required class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <div>
                    <label for="caratula" class="block text-sm font-medium text-gray-700">Carátula:</label>
                    <input type="file" name="caratula" id="caratula" required class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <div>
                    <label for="song_path" class="block text-sm font-medium text-gray-700">Archivo de la Canción:</label>
                    <input type="file" name="song_path" id="song_path" required class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="px-4 py-2 font-bold text-black bg-blue-600 rounded hover:bg-blue-700 focus:outline-none focus:shadow-outline">
                    <i class="mr-2 fas fa-save"></i>Guardar
                    </button>
                    
                </div>
                <a href="{{ route('admin.canciones.index') }}" class="px-4 py-2 text-white bg-gray-500 rounded hover:bg-gray-600">Volver</a>
            </form>
        </div>
    </div>
</div>
@endsection
