{{-- resources/views/categorias/edit.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <h1 class="text-xl font-semibold">Editar Categoría</h1>

            <form action="{{ route('categorias.update', $categoria->id) }}" method="POST" class="mt-4">
                @csrf
                @method('PUT')
                <div>
                    <label for="nombre" class="block font-medium text-sm text-gray-700">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" value="{{ $categoria->nombre }}" required class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
                </div>

                <div class="mt-4">
                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white font-bold rounded-md">
                        Actualizar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
