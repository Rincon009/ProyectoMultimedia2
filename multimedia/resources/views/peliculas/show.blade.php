@extends('layouts.app')

@section('content')
<style>
    .background-cover {
        background-image: url('{{ asset("/images/fondo4.png") }}');
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
    .video-container {
        margin-top: 20px; /* Espacio entre el texto y el video */
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
        .content, .video-container {
            width: 100%; /* Hace que el contenido y el video ocupen el ancho completo */
        }
    }
    .back-button {
        display: block;
        padding: 8px 16px;
        margin-top: 20px; /* Espacio entre la carátula y el botón */
        background-color: #007bff; /* Color de fondo del botón */
        color: white; /* Color del texto del botón */
        text-align: center;
        border-radius: 4px;
        text-decoration: none;
    }

    .back-button:hover {
        background-color: #0056b3; /* Color de fondo del botón al pasar el ratón */
    }
</style>

<div class="background-cover">
<div class="py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
    <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
        <div class="container p-6 bg-white border-b border-gray-200">
            <!-- Contenedor de la carátula -->
            @if ($pelicula->caratula)
            <div class="cover-image">
                <img src="{{ asset('caratulasupload/' .  basename($pelicula->caratula)) }}" alt="Carátula de {{ $pelicula->titulo }}" style="width: 100%; height: auto;">
            <!-- Botón para volver atrás -->
          
            </div>
            @endif
            
            <!-- Contenedor de la información y reproductor de video -->
            <div class="content">
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
            <a href="{{ route('peliculas.index') }}" class="px-4 py-2 text-white bg-gray-500 rounded hover:bg-gray-600">Volver</a>
        </div>
        
    </div>
</div>
</div>
@endsection
