@extends('layouts.app')

@section('content')
<style>
    .details-container {
        display: flex;
        flex-direction: row; /* Cambiado a row para alinear elementos horizontalmente */
        gap: 20px;
        background: #ffffff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .left-container {
        flex-basis: 30%; /* Ajustado el ancho de la sección izquierda */
    }

    .right-container {
        flex-basis: 70%; /* Ajustado el ancho de la sección derecha */
    }

    .cover-image {
        max-width: 100%; /* Asegura que la imagen no exceda el contenedor */
        height: auto;
        border-radius: 8px;
        margin-bottom: 20px; /* Espacio entre la imagen y los botones */
    }

    .buttons-container {
        display: flex;
        flex-direction: column;
        gap: 10px; /* Espacio entre botones */
    }

    .audio-video-container {
        margin-top: 20px;
    }

    @media (max-width: 768px) {
        .details-container {
            flex-direction: column; /* Alineación vertical para dispositivos móviles */
        }

        .left-container, .right-container {
            flex-basis: 100%; /* Ocupar el ancho completo en móviles */
        }
    }
</style>

<div class="py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
    <div class="details-container">
        <div class="left-container">
            @if ($cancion->caratula)
                <img src="{{ asset('caratulasupload/' . basename($cancion->caratula)) }}" alt="Carátula de {{ $cancion->titulo }}" class="cover-image">
            @endif
            <div class="buttons-container">
                <a href="{{ route('admin.canciones.edit', ['cancion' => $cancion->id]) }}" class="inline-flex items-center px-4 py-2 font-bold text-black rounded-md hover:bg-gray-700">Editar</a>
                <form action="{{ route('admin.canciones.destroy', ['cancion' => $cancion->id]) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('¿Estás seguro de querer eliminar esta canción?');" class="inline-flex items-center px-4 py-2 font-bold text-white bg-red-500 rounded-md hover:bg-red-700">Eliminar</button>
                </form>
                <a href="{{ route('admin.canciones.index') }}" class="inline-flex items-center px-4 py-2 font-bold text-white bg-gray-500 rounded-md hover:bg-gray-700">Volver al listado</a>
            </div>
        </div>
        <div class="right-container">
            <h1 class="text-xl font-semibold">{{ $cancion->titulo }}</h1>
            <p>Artista: {{ $cancion->artista }}</p>
            <p>Álbum: {{ $cancion->album ?? 'Sin álbum' }}</p>
            <p>Año: {{ $cancion->anio }}</p>
           
            @if ($cancion->song_path)
                <div class="audio-container">
                    <audio controls style="width: 100%;">
                        <source src="{{ asset('cancionesupload/' . basename($cancion->song_path)) }}" type="audio/mpeg">
                        Tu navegador no soporta el elemento de audio.
                    </audio>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
