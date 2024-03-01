<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pelicula;
use App\Models\Categoria;
use Illuminate\Http\Request;


class AdminPeliculaController extends Controller
{
    /**
     * Display a listing of the movies.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
{
    $categorias = Categoria::all(); 
    $categoriaId = $request->categoria_id; 

    if ($categoriaId) {
        $peliculas = Pelicula::where('categoria_id', $categoriaId)->get(); 
    } else {
        $peliculas = Pelicula::all(); 
    }

    return view('admin.peliculas.index', compact('peliculas', 'categorias'));
}

    /**
     * Show the form for creating a new movie.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view('admin.peliculas.create', compact('categorias'));
    }

    /**
     * Store a newly created movie in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    $request->validate([
        'titulo' => 'required|max:255',
        'descripcion' => 'required',
        'director' => 'required|max:255',
        'fecha_lanzamiento' => 'required|date',
        'categoria_id' => 'required|exists:categorias,id',
        'caratula' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'movie_path' => 'required|file|mimes:mp4,mkv,avi|max:50000',
    ]);

    $caratulaPath = '';
    $moviePath = '';

    if ($request->hasFile('caratula')) {
        $caratulaNombre = $request->caratula->getClientOriginalName();
        $request->caratula->move(public_path('caratulasupload'), $caratulaNombre);
        $caratulaPath = 'caratulasupload/' . $caratulaNombre;
    }

    if ($request->hasFile('movie_path')) {
        $movieNombre = $request->movie_path->getClientOriginalName();
        $request->movie_path->move(public_path('peliculasupload'), $movieNombre);
        $moviePath = 'peliculasupload/' . $movieNombre;
    }

    Pelicula::create([
        'titulo' => $request->titulo,
        'descripcion' => $request->descripcion,
        'director' => $request->director,
        'fecha_lanzamiento' => $request->fecha_lanzamiento,
        'categoria_id' => $request->categoria_id,
        'caratula' => $caratulaPath,
        'movie_path' => $moviePath,
    ]);

    return redirect()->route('admin.peliculas.index')->with('success', 'Película creada con éxito.');
}

    /**
     * Display the specified movie.
     *
     * @param  \App\Models\Pelicula  $pelicula
     * @return \Illuminate\Http\Response
     */
    public function show($id)
{
    $pelicula = Pelicula::findOrFail($id);
    return view('admin.peliculas.show', compact('pelicula'));
}

    /**
     * Show the form for editing the specified movie.
     *
     * @param  \App\Models\Pelicula  $pelicula
     * @return \Illuminate\Http\Response
     */
    public function edit(Pelicula $pelicula)
    {
        $categorias = Categoria::all();
        return view('admin.peliculas.edit', compact('pelicula', 'categorias'));
    }

    /**
     * Update the specified movie in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pelicula  $pelicula
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pelicula $pelicula)
{
    $request->validate([
        'titulo' => 'required|max:255',
        'descripcion' => 'required',
        'director' => 'required|max:255',
        'fecha_lanzamiento' => 'required|date',
        'categoria_id' => 'required|exists:categorias,id',
        'caratula' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'movie_path' => 'sometimes|file|mimes:mp4,mkv,avi|max:50000',
    ]);

    $data = $request->only(['titulo', 'descripcion', 'director', 'fecha_lanzamiento', 'categoria_id']);

    if ($request->hasFile('caratula')) {
        $caratulaAntigua = $pelicula->caratula;
        $caratulaNombre = $request->caratula->getClientOriginalName();
        $request->caratula->move(public_path('caratulasupload'), $caratulaNombre);
        $data['caratula'] = 'caratulasupload/' . $caratulaNombre;
        if ($caratulaAntigua && file_exists(public_path($caratulaAntigua))) {
            unlink(public_path($caratulaAntigua));
        }
    }
    
    if ($request->hasFile('movie_path')) {
        $movieAntiguo = $pelicula->movie_path;
        $movieNombre = $request->movie_path->getClientOriginalName();
        $request->movie_path->move(public_path('peliculasupload'), $movieNombre);
        $data['movie_path'] = 'peliculasupload/' . $movieNombre;
        if ($movieAntiguo && file_exists(public_path($movieAntiguo))) {
            unlink(public_path($movieAntiguo));
        }
    }
    
    $pelicula->update($data);

    return redirect()->route('admin.peliculas.index')->with('success', 'Película actualizada con éxito.');
}

    /**
     * Remove the specified movie from storage.
     *
     * @param  \App\Models\Pelicula  $pelicula
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pelicula $pelicula)
    {
        $pelicula->delete();
        return redirect()->route('admin.peliculas.index')->with('success', 'Película eliminada con éxito.');
    }
}
