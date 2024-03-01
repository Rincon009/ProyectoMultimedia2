@extends('layouts.app')

@section('content')
<style>
    body, html {
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
        background-color: #000; 
        color: white;
    }

    .container {
        max-width: 1200px;
        margin: auto;
        padding: 20px;
        background-color: rgba(255, 255, 255, 0.1); 
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.5);
    }

    .btn {
        display: inline-block;
        background-color: #444; 
        color: #fff;
        padding: 10px 20px;
        border-radius: 5px;
        text-decoration: none;
        transition: background-color 0.3s;
    }

    .btn:hover {
        background-color: #666; 
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        padding: 10px;
        border-bottom: 1px solid #ddd;
        color: white; 
    }

    th {
        text-align: left;
        background-color: #222; 
    }

    @media (max-width: 768px) {
        .container {
            width: 95%;
            margin: 20px auto;
        }

        .btn {
            padding: 8px 16px;
        }
    }
</style>

<div class="container">
    <div class="py-6 mx-auto sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-2xl font-bold">Listado de Categorías</h1>
            <div>
                <a href="{{ route('admin.categorias.create') }}" class="btn">Añadir nueva categoría</a>
                <a href="{{ route('dashboard') }}" class="btn">Volver al Inicio</a>
            </div>
        </div>
        @if ($categorias->isEmpty())
            <p>No hay categorías disponibles.</p>
        @else
            <div class="mt-4">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Nombre</th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="bg-black divide-y divide-gray-200">
                        @foreach ($categorias as $categoria)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $categoria->nombre }}</td>
                            <td class="px-6 py-4 text-sm font-medium whitespace-nowrap">
                                <a href="{{ route('admin.categorias.edit', $categoria->id) }}" class="mr-3 text-indigo-600 hover:text-indigo-900">Editar</a>
                                <form action="{{ route('admin.categorias.destroy', $categoria->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de querer eliminar esta categoría?');" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>
@endsection
