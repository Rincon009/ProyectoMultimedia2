@extends('layouts.app')
@section('content')
<style>
    .background-cover {
        background-image: url('{{ asset("/images/fondo5.png") }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        height: 100vh;
    }
    .container {
        display: flex;
        flex-wrap: wrap; /* Permite que los elementos se envuelvan si no hay espacio suficiente */
        align-items: flex-start;
    }
    .cover-image {
        flex: 0 1 200px; /* Ajusta el tamaño de la imagen aquí */
        margin-right: 20px; /* Espacio entre la imagen y el contenido/texto */
    }
    .content {
        flex: 1;
    }
    .audio-container {
        margin-top: 20px; /* Espacio entre el texto y el audio */
    }
    .btn {
        background-color: #007bff; /* Color de fondo */
        color: white; /* Color del texto */
        padding: 10px 15px; /* Padding */
        border-radius: 5px; /* Bordes redondeados */
        text-decoration: none; /* Eliminar subrayado del texto */
        transition: background-color 0.3s; /* Transición suave al cambiar el color de fondo */
    }

    .btn:hover {
        background-color: #0056b3; /* Color de fondo al pasar el ratón */
    }

    .navigation-buttons {
        display: flex;
        justify-content: space-between; /* Distribuir espacio entre botones */
        margin-top: 20px; /* Margen superior */
    }

    @media (max-width: 768px) { /* Para tabletas y dispositivos más pequeños */
        .container {
            flex-direction: column; /* Cambia la dirección del flex a columna para dispositivos más pequeños */
        }
        .cover-image {
            margin-right: 0; /* Elimina el margen derecho en dispositivos más pequeños */
            margin-bottom: 20px; /* Añade un margen inferior para separar la imagen del contenido */
            flex: 0 0 auto; /* Ajusta la flexibilidad de la imagen */
            width: 100%; /* Hace que la imagen ocupe el ancho completo */
        }
        .content, .audio-container {
            width: 100%; /* Hace que el contenido y el audio ocupen el ancho completo */
        }
    }
</style>
<div class="background-cover">
<div class="py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
    <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
        <div class="container p-6 bg-white border-b border-gray-200">
            <!-- Contenedor de la carátula -->
            @if ($cancion->caratula)
            <div class="cover-image">
                <img src="{{ asset('caratulasupload/' . basename($cancion->caratula)) }}" alt="Carátula de {{ $cancion->titulo }}" style="width: 100%; height: auto;">
            </div>
            
            @endif
            
            <!-- Contenedor de la información y reproductor de audio -->
            <div class="content">
                <h1 class="text-xl font-semibold">{{ $cancion->titulo }}</h1>
                <p>Artista: {{ $cancion->artista }}</p>
                <p>Álbum: {{ $cancion->album }}</p>
                <p>Año: {{ $cancion->anio }}</p>

                @if ($cancion->song_path)
                <div class="audio-container">
                    <audio controls style="width: 100%;">
                        <source src="{{ asset('cancionesupload/' . basename($cancion->song_path)) }}" type="audio/mpeg">
                        Tu navegador no soporta el elemento de audio.
                    </audio>
                    <div class="navigation-buttons">
                    @if ($cancionAnterior)
                        <a href="{{ route('canciones.show', $cancionAnterior->id) }}" class="btn">Anterior</a>
                    @endif
                    @if ($cancionSiguiente)
                        <a href="{{ route('canciones.show', $cancionSiguiente->id) }}" class="btn">Siguiente</a>
                    @endif
                </div>
                </div>
                
                @endif
            </div>
            <a href="{{ route('canciones.index') }}" class="px-4 py-2 text-white bg-gray-500 rounded hover:bg-gray-600">Volver</a>
        </a>
        
            </div>
        </div>
    </div>
</div>
@endsection