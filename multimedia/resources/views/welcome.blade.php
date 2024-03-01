@extends('layouts.app')

@section('content')

<style>
.background-cover {
    background-image: url('/images/fondo.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    height: 100vh;
}

.centered-content {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100%;
}

.opacity-bg {
    background: rgba(255, 255, 255, 0.9);
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
}
</style>

<div class="background-cover">
    <div class="centered-content">
        <div class="text-center opacity-bg">
            <h1 class="mb-4 display-3 font-weight-bold">Bienvenido al Catálogo Multimedia</h1>
            <p class="mb-5 lead">Explora una amplia variedad de películas y canciones desde cualquier lugar.</p>
            <div class="gap-3 d-flex flex-column flex-md-row justify-content-center">
                <a href="{{ route('peliculas.index') }}" class="btn btn-lg btn-primary" role="button">
                    <i class="mr-2 fas fa-film"></i> Ver Películas
                </a>
                <a href="{{ route('canciones.index') }}" class="btn btn-lg btn-success" role="button">
                    <i class="mr-2 fas fa-music"></i> Ver Canciones
                </a>
            </div>
        </div>
    </div>
</div>

@endsection
