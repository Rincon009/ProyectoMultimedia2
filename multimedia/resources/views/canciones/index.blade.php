@extends('layouts.app')

@section('content')
<style>
    .background-cover {
        background-image: url('{{ asset("/images/fondo3.jpg") }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        height: 100vh;
    }
    .list-container {
        background-color: #f3f4f6;
        border-radius: 8px;
        padding: 16px;
        margin: auto;
        width: 90%; /* Ajustado para mayor responsividad */
        max-width: 100%;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-top: 20px;
    }
    .item {
        border-bottom: 1px solid #e5e7eb;
        padding: 12px;
    }
    .title, .category, .actions {
        padding: 12px;
    }
    .category {
        color: #6b7280;
    }
    .actions a {
        color: #2563eb;
        margin-right: 8px;
        text-decoration: none;
    }
    .actions a:hover {
        color: #1d4ed8;
    }
    /* Estilos para mejorar la responsividad de la tabla */
    @media screen and (max-width: 768px) {
        table {
            display: block;
            overflow-x: auto;
        }
        thead {
            display: none; /* Oculta los encabezados en dispositivos móviles */
        }
        tr {
            display: block;
            margin-bottom: 20px;
        }
        td {
            display: block;
            text-align: right;
            padding-left: 50%;
            position: relative;
        }
        td::before {
            content: attr(data-label);
            position: absolute;
            left: 0;
            width: 50%;
            padding-left: 15px;
            font-weight: bold;
            text-align: left;
        }
    }
</style>

<div class="background-cover">
    <div class="list-container">
        <div class="mb-4">
            <h1 class="text-2xl font-bold">Listado de Canciones</h1>
        </div>
            <div class="mt-4">
                <table class="min-w-full">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">Título</th>
                            <th class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">Artista</th>
                            <th class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($canciones as $cancion)
                        <tr class="item">
                            <td data-label="Título">{{ $cancion->titulo }}</td>
                            <td data-label="Artista">{{ $cancion->artista }}</td>
                            <td data-label="Acciones"><a href="{{ route('canciones.show', $cancion->id) }}" class="mr-3 text-indigo-600 hover:text-indigo-900">Escuchar</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
  
        <a href="{{ route('welcome') }}" class="px-4 py-2 text-white bg-gray-500 rounded hover:bg-gray-600">Volver</a>

    </div>
</div>

@endsection
