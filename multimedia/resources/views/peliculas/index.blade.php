@extends('layouts.app')
@section('content')
<style>
    .background-cover {
        background-image: url('{{ asset("/images/fondo2.jpg") }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        height: 100vh;
    }
    .filter-container {
        display: flex;
        justify-content: space-between; 
        align-items: center; 
        margin-bottom: 1rem;
    }
    .movie-list-container {
        background-color: #f3f4f6; 
        border-radius: 8px;
        padding: 16px;
        margin: auto; 
        width: 50%; 
        max-width: 100%; 
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
        margin-top: 20px; 
    }

    .movie-item {
        border-bottom: 1px solid #e5e7eb;
    }

    .movie-title, .movie-category, .movie-actions {
        padding: 12px; 
    }


    .movie-category {
        color: #6b7280;
       
    }

    .movie-actions a {
        color: #2563eb;
        margin-right: 8px;
    }

    .movie-actions a:hover {
        color: #1d4ed8;
      
    }
    @media (max-width: 768px) {
        .filter-container {
            flex-direction: column; /* Cambio a columna en pantallas pequeñas */
            align-items: flex-start; /* Alineación al inicio */
        }
        .filter-container select {
            width: 100%; /* Selector de categoría a ancho completo */
            margin-top: 10px; /* Espacio después del título */
        }
        .movie-list-container {
            width: 95%; /* Mayor anchura en pantallas pequeñas */
        }
        .movie-title, .movie-category, .movie-actions {
            padding: 8px; /* Padding reducido */
        }
    }
</style>
<div class="background-cover">
    <div class="movie-list-container">
        <div class="filter-container">
            <h1 class="text-2xl font-bold">Listado de Películas</h1>
            <form action="{{ route('peliculas.index') }}" method="GET">
                <select name="categoria_id" onchange="this.form.submit()">
                    <option value="">Todas las categorías</option>
                    @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ request('categoria_id') == $categoria->id ? 'selected' : '' }}>
                        {{ $categoria->nombre }}
                    </option>
                    @endforeach
                </select>
            </div>
        @if($peliculas->isEmpty())
        <p>No hay películas disponibles.</p>
        @else
        <div class="mt-4">
            <table class="min-w-full">
                <thead>
                    <tr>
                    
                        <th class="px-6 py-3 font-medium tracking-wider text-left text-gray-500 uppercase">Título</th>
                        <th class="px-6 py-3 font-medium tracking-wider text-left text-gray-500 uppercase">Categoría</th>
                        <th class="px-6 py-3 font-medium tracking-wider text-left text-gray-500 uppercase">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($peliculas as $pelicula)
                    <tr class="movie-item">
                        <td class="px-6 py-4 whitespace-nowrap movie-title">
                            {{ $pelicula->titulo }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap movie-category">
                            {{ $pelicula->categoria->nombre ?? 'Sin categoría' }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap movie-actions">
                            <a href="{{ route('peliculas.show', $pelicula->id) }}">Ver</a>
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
            <a href="{{ route('welcome') }}" class="px-4 py-2 text-white bg-gray-500 rounded hover:bg-gray-600">Volver</a>
        </div>
        @endif
    </div>
   

</div>

@endsection