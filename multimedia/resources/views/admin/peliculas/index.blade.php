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
        max-width: 1200px;
        margin: auto;
        padding: 20px;
        background-color: rgba(255, 255, 255, 0.1); /* Fondo ligeramente transparente para ver el fondo negro */
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.5);
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
        text-align: left;
        background-color: #222; /* Fondo oscuro para los encabezados */
        color: white;
    }

    @media (max-width: 768px) {
        .container {
            width: 95%;
            margin: 20px auto;
        }

        .btn {
            padding: 8px 16px; /* Botones más pequeños en dispositivos móviles */
        }
    }
</style>

<div class="container">
    <div class="py-6 mx-auto sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-2xl font-bold">Listado de Películas</h1>
            <div>
                <a href="{{ route('admin.peliculas.create') }}" class="btn">Añadir nueva película</a>
                <a href="{{ route('dashboard') }}" class="btn">Volver al Inicio</a>
                <form action="{{ route('admin.peliculas.index') }}" method="GET" class="mb-4">
    <div class="flex items-center justify-between">
        <select name="categoria_id" onchange="this.form.submit()" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            <option value="">Todas las categorías</option>
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}" {{ request('categoria_id') == $categoria->id ? 'selected' : '' }}>{{ $categoria->nombre }}</option>
            @endforeach
        </select>
    </div>
</form>
            </div>
            
        </div>
        @if($peliculas->isEmpty())
                <p>No hay películas disponibles.</p>
            @else
                <div class="mt-4">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Título</th>
                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Categoría</th>
                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="bg-black divide-y divide-gray-200">
                            @foreach ($peliculas as $pelicula)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $pelicula->titulo }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $pelicula->categoria->nombre ?? 'Sin categoría' }}</td>
                                <td class="px-6 py-4 text-sm font-medium whitespace-nowrap">
                                    <a href="{{ route('admin.peliculas.show', $pelicula->id) }}" class="mr-3 text-indigo-600 hover:text-indigo-900">Ver</a>
                                    <a href="{{ route('admin.peliculas.edit', $pelicula->id) }}" class="text-indigo-600 hover:text-indigo-900">Editar</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    


                </div>
            @endif
        </div>
    </div>
</div>
@endsection
