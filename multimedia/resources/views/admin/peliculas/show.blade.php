@extends('layouts.app')

@section('content')
<style>
    .details-container {
        display: flex;
        flex-direction: row;
        gap: 20px;
        background: #ffffff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .left-container {
        flex-basis: 40%;
        text-align: center;
    }

    .cover-image {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
        margin-bottom: 20px; /* Espacio entre la imagen y los botones */
    }

    .right-container {
        flex-basis: 60%;
    }

    .video-container {
        margin-top: 20px;
    }

    @media (max-width: 768px) {
        .details-container {
            flex-direction: column;
        }

        .left-container, .right-container {
            flex-basis: 100%;
        }
    }
</style>

<div class="py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
    <div class="details-container">
        <div class="left-container">
            @if ($pelicula->caratula)
                <img src="{{ asset('caratulasupload/' . basename($pelicula->caratula)) }}" alt="Carátula de {{ $pelicula->titulo }}" class="cover-image">
            @endif
            <div>
                <a href="{{ route('admin.peliculas.edit', $pelicula->id) }}" class="inline-flex items-center px-4 py-2 font-bold text-black rounded-md hover:bg-gray-700">Editar</a>
                <form action="{{ route('admin.peliculas.destroy', $pelicula->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('¿Estás seguro de querer eliminar esta película?');" class="inline-flex items-center px-4 py-2 font-bold text-white bg-red-500 rounded-md hover:bg-red-700">Eliminar</button>
                </form>
                <a href="{{ route('admin.peliculas.index') }}" class="inline-flex items-center px-4 py-2 font-bold text-white bg-gray-500 rounded-md hover:bg-gray-700">Volver al listado</a>
            </div>
        </div>
        <div class="right-container">
            <h1 class="text-xl font-semibold">{{ $pelicula->titulo }}</h1>
            <p>{{ $pelicula->descripcion }}</p>
            <p>Director: {{ $pelicula->director }}</p>
            <p>Fecha de Lanzamiento: {{ \Carbon\Carbon::parse($pelicula->fecha_lanzamiento)->toFormattedDateString() }}</p>
            <p>Categoría: {{ $pelicula->categoria->nombre ?? 'Sin categoría' }}</p>
            @if ($pelicula->movie_path)
                <div class="video-container">
                    <video controls style="width: 100%;">
                        <source src="{{ asset('peliculasupload/' . basename($pelicula->movie_path)) }}" type="video/mp4">
                        Tu navegador no soporta la etiqueta de video.
                    </video>
                </div>
                @endif
        </div>
    </div>
</div>
@endsection
