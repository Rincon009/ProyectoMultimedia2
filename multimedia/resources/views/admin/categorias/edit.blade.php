{{-- resources/views/categorias/edit.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
    <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <h1 class="text-xl font-semibold">Editar Categoría</h1>

            <form action="{{ route('admin.categorias.update', $categoria->id) }}" method="POST" class="mt-4">
                @csrf
                @method('PUT')
                <div>
                    <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" value="{{ $categoria->nombre }}" required class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
                </div>

                <div class="mt-4">
                <a href="{{ route('admin.categorias.index') }}" class="inline-flex items-center px-4 py-2 mr-2 text-black bg-gray-500 rounded hover:bg-gray-700">Cancelar</a>
                    <button type="submit" class="inline-flex items-center px-4 py-2 mr-2 text-black bg-white rounded hover:bg-white">
                        Actualizar Canción
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
