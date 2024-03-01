<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use App\Models\Categoria;
use Illuminate\Http\Request;

class PeliculaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


public function index(Request $request)
{
    $categorias = Categoria::all(); // Obtener todas las categorías

    // Filtrar películas por categoría si se ha especificado
    if ($request->has('categoria_id') && $request->categoria_id != '') {
        $peliculas = Pelicula::where('categoria_id', $request->categoria_id)->get();
    } else {
        $peliculas = Pelicula::all(); // O Obtener todas las películas si no hay filtro
    }

    return view('peliculas.index', compact('peliculas', 'categorias'));
}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Obtener todas las categorías para el formulario de creación
        $categorias = Categoria::all();
        return view('peliculas.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validación de datos incluyendo el archivo de la película
        $request->validate([
            'titulo' => 'required|max:255',
            'descripcion' => 'required',
            'director' => 'required|max:255',
            'fecha_lanzamiento' => 'required|date',
            'categoria_id' => 'required|exists:categorias,id',
            'caratula' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'movie_path' => 'required|file|mimes:mp4,mkv,avi|max:50000', // Ajuste según tus necesidades
        ]);

        // Procesar y almacenar el archivo de carátula
        $caratulaPath = $request->caratula->store('public/caratulas');

        // Procesar y almacenar el archivo de la película
        $moviePath = $request->file('movie_path')->store('public/peliculas');

        // Crear nueva película con los datos validados y los paths de los archivos
        Pelicula::create(array_merge($request->all(), [
            'caratula' => $caratulaPath,
            'movie_path' => $moviePath,
        ]));

        return redirect()->route('peliculas.index')->with('success', 'Película creada con éxito.');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pelicula  $pelicula
     * @return \Illuminate\Http\Response
     */
    public function show(Pelicula $pelicula)
    {
        // Mostrar detalles de una película específica
        return view('peliculas.show', compact('pelicula'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pelicula  $pelicula
     * @return \Illuminate\Http\Response
     */
    public function edit(Pelicula $pelicula)
    {
        // Obtener todas las categorías para el formulario de edición
        $categorias = Categoria::all();
        return view('peliculas.edit', compact('pelicula', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pelicula  $pelicula
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pelicula $pelicula)
    {
        // Validación de datos incluyendo condicional para el archivo de la película
        $request->validate([
            'titulo' => 'required|max:255',
            'descripcion' => 'required',
            'director' => 'required|max:255',
            'fecha_lanzamiento' => 'required|date',
            'categoria_id' => 'required|exists:categorias,id',
            'caratula' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'movie_path' => 'sometimes|file|mimes:mp4,mkv,avi|max:50000', // Ajuste según tus necesidades
        ]);

        // Procesar y almacenar el archivo de carátula si se proporciona uno nuevo
        if ($request->hasFile('caratula')) {
            // Asegúrate de eliminar el archivo antiguo si es necesario
            $caratulaPath = $request->caratula->store('public/caratulas');
            $pelicula->caratula = $caratulaPath;
        }

        // Procesar y almacenar el archivo de la película si se proporciona uno nuevo
        if ($request->hasFile('movie_path')) {
            // Asegúrate de eliminar el archivo antiguo si es necesario
            $moviePath = $request->file('movie_path')->store('public/peliculas');
            $pelicula->movie_path = $moviePath;
        }

        // Actualizar película con los datos validados
        $pelicula->update($request->except(['caratula', 'movie_path']));

        return redirect()->route('peliculas.index')->with('success', 'Película actualizada con éxito.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pelicula  $pelicula
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pelicula $pelicula)
    {
        // Eliminar película
        $pelicula->delete();
        return redirect()->route('peliculas.index')->with('success', 'Película eliminada con éxito.');
    }

    public function adminIndex()
    {
        $peliculas = Pelicula::all();
        return view('admin.peliculas.index', compact('peliculas'));
    }
}
