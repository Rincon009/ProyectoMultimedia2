@extends('layouts.app')

@section('content')
<style>
    body, html {
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
        background-color: #000; /* Fondo negro para todo el sitio */
        color: white; /* Texto en blanco para contrastar con el fondo */
    }

    .container {
        margin: auto;
        padding: 20px;
        background-color: rgba(255, 255, 255, 0.1); /* Fondo ligeramente transparente */
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.5);
    }

    @media (min-width: 768px) {
        .container {
            max-width: 1200px;
        }
    }

    .btn {
        display: inline-block;
        background-color: #444; /* Fondo oscuro para los botones */
        color: #fff;
        padding: 10px 20px;
        border-radius: 5px;
        text-decoration: none;
        transition: background-color 0.3s;
    }

    .btn:hover {
        background-color: #666; /* Cambio de color al pasar el mouse */
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        padding: 10px;
        border-bottom: 1px solid #ddd; /* Líneas sutiles para separar filas */
    }

    th {
        background-color: #222; /* Fondo oscuro para los encabezados */
        color: white;
    }

    @media (max-width: 768px) {
        table, thead, tbody, th, td, tr {
            display: block;
        }

        thead tr {
            position: absolute;
            top: -9999px;
            left: -9999px;
        }

        tr {
            border: 1px solid #ccc;
            margin-bottom: 5px;
        }

        td {
            border: none;
            border-bottom: 1px solid #eee;
            position: relative;
            padding-left: 50%;
            text-align: right;
        }

        td:before {
            position: absolute;
            top: 6px;
            left: 6px;
            width: 45%;
            padding-right: 10px;
            white-space: nowrap;
            text-align: left;
            font-weight: bold;
            content: attr(data-label);
        }
    }
</style>

<div class="container px-4 py-6 mx-auto sm:px-6 lg:px-8">
    <div class="flex flex-col mb-4">
        <h1 class="text-2xl font-bold text-white">Listado de Canciones</h1>
        <div class="flex mt-4 space-x-2">
            <a href="{{ route('admin.canciones.create') }}" class="btn">Añadir nueva canción</a>
            <a href="{{ route('dashboard') }}" class="btn">Volver al Inicio</a>
        </div>
    </div>
    @if($canciones->isEmpty())
        <p class="text-white">No hay canciones disponibles.</p>
    @else
        <div class="mt-4">
            <table>
                <thead class="text-white bg-gray-700">
                    <tr>
                        <th>Título</th>
                        <th>Artista</th>
                        <th>Álbum</th>
                        <th>Año</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody class="text-white bg-gray-800">
                    @foreach ($canciones as $cancion)
                    <tr>
                        <td data-label="Título">{{ $cancion->titulo }}</td>
                        <td data-label="Artista">{{ $cancion->artista }}</td>
                        <td data-label="Álbum">{{ $cancion->album }}</td>
                        <td data-label="Año">{{ $cancion->anio }}</td>
                        <td data-label="Acciones">
                            <a href="{{ route('admin.canciones.show', $cancion->id) }}" class="text-blue-400 hover:text-blue-600">Ver</a>
                            <a href="{{ route('admin.canciones.edit', $cancion->id) }}" class="text-green-400 hover:text-green-600">Editar</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
