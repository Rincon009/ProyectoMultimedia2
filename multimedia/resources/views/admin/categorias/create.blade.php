{{-- resources/views/categorias/create.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
    <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <h1 class="text-xl font-semibold">Añadir Nueva Categoría</h1>

            <form action="{{ route('admin.categorias.store') }}" method="POST" class="mt-4">
                @csrf
                <div>
                    <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" required class="text-gray-800 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
                </div>

                <div class="mt-4">
                    <button type="submit" class="inline-flex items-center px-4 py-2 font-bold text-black ">
                        Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
