{{-- resources/views/categorias/index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <h1 class="text-2xl font-bold">Listado de Categorías</h1>
            <a href="{{ route('categorias.create') }}" class="text-blue-500">Añadir nueva categoría</a>
            
            @if ($categorias->isEmpty())
                <p>No hay categorías disponibles.</p>
            @else
                <ul class="list-disc pl-5 mt-4">
                    @foreach ($categorias as $categoria)
                    <li class="mt-2">
                        {{ $categoria->nombre }}
                        <a href="{{ route('categorias.edit', $categoria->id) }}" class="text-blue-500">Editar</a>
                        <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de querer eliminar esta categoría?');" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500">Eliminar</button>
                        </form>
                    </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</div>
@endsection
