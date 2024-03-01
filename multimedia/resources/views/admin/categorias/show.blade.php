{{-- resources/views/categorias/show.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
    <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <h1 class="text-xl font-semibold">Categoría: {{ $categoria->nombre }}</h1>
            <p class="mt-4">Listado de películas en esta categoría:</p>

            @if ($categoria->peliculas->isEmpty())
                <p class="mt-2">No hay películas asignadas a esta categoría.</p>
            @else
                <ul class="pl-5 mt-4 list-disc">
                    @foreach ($categoria->peliculas as $pelicula)
                        <li class="mt-2">
                            {{ $pelicula->titulo }} - Director: {{ $pelicula->director }} - Año: {{ $pelicula->fecha_lanzamiento->format('Y') }}
                            <a href="{{ route('admin.categorias.show', $pelicula->id) }}" class="text-blue-600 hover:text-blue-800">Ver detalles</a>
                        </li>
                    @endforeach
                </ul>
            @endif

            <div class="mt-6">
                <a href="{{ route('admin.categorias.edit', $categoria->id) }}" class="px-4 py-2 mr-4 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">
                    Editar Categoría
                </a>
                <form action="{{ route('admin.categorias.destroy', $categoria->id) }}" method="POST" style="display:inline" onsubmit="return confirm('¿Estás seguro de querer eliminar esta categoría?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 font-bold text-white bg-red-500 rounded hover:bg-red-700">
                        Eliminar Categoría
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
