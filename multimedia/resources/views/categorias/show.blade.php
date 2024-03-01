{{-- resources/views/categorias/show.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <h1 class="text-xl font-semibold">Categoría: {{ $categoria->nombre }}</h1>
            <p class="mt-4">Listado de películas en esta categoría:</p>

            @if ($categoria->peliculas->isEmpty())
                <p class="mt-2">No hay películas asignadas a esta categoría.</p>
            @else
                <ul class="list-disc pl-5 mt-4">
                    @foreach ($categoria->peliculas as $pelicula)
                        <li class="mt-2">
                            {{ $pelicula->titulo }} - Director: {{ $pelicula->director }} - Año: {{ $pelicula->fecha_lanzamiento->format('Y') }}
                            <a href="{{ route('peliculas.show', $pelicula->id) }}" class="text-blue-600 hover:text-blue-800">Ver detalles</a>
                        </li>
                    @endforeach
                </ul>
            @endif

            <div class="mt-6">
                <a href="{{ route('categorias.edit', $categoria->id) }}" class="mr-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Editar Categoría
                </a>
                <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" style="display:inline" onsubmit="return confirm('¿Estás seguro de querer eliminar esta categoría?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                        Eliminar Categoría
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
