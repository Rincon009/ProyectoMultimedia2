{{-- resources/views/canciones/edit.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <h1 class="text-xl font-semibold mb-4">Editar Canción: {{ $cancion->titulo }}</h1>

            <form action="{{ route('admin.canciones.update', $cancion->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label for="titulo" class="block font-medium text-sm text-gray-700">Título:</label>
                    <input type="text" name="titulo" id="titulo" value="{{ $cancion->titulo }}" required class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <div>
                    <label for="artista" class="block font-medium text-sm text-gray-700">Artista:</label>
                    <input type="text" name="artista" id="artista" value="{{ $cancion->artista }}" required class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <div>
                    <label for="album" class="block font-medium text-sm text-gray-700">Álbum:</label>
                    <input type="text" name="album" id="album" value="{{ $cancion->album }}" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <div>
                    <label for="anio" class="block font-medium text-sm text-gray-700">Año:</label>
                    <input type="number" name="anio" id="anio" value="{{ $cancion->anio }}" required class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <div>
                    <label for="caratula" class="block font-medium text-sm text-gray-700">Carátula (opcional):</label>
                    <input type="file" name="caratula" id="caratula" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white font-bold rounded-md">
                        Actualizar Canción
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
