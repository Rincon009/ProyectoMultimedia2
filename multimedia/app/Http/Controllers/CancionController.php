<?php

namespace App\Http\Controllers;

use App\Models\Cancion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class CancionController extends Controller
{
    public function index()
    {
        $canciones = Cancion::all();
        return view('canciones.index', compact('canciones'));
    }

    public function create()
    {
        return view('canciones.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|max:255',
            'artista' => 'required|max:255',
            'album' => 'nullable|max:255',
            'anio' => 'required|digits:4|integer|min:1900|max:' . date('Y'),
            'caratula' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'song_path' => 'required|file|mimes:mp3,wav,aac|max:10240',
        ]);

        $caratulaPath = $request->caratula->store('public/caratulas');
        $songPath = $request->file('song_path')->store('public/canciones');

        Cancion::create([
            'titulo' => $request->titulo,
            'artista' => $request->artista,
            'album' => $request->album,
            'anio' => $request->anio,
            'caratula' => $caratulaPath,
            'song_path' => $songPath,
        ]);

        return redirect()->route('canciones.index')->with('success', 'Canción creada con éxito.');
    }

    public function show($id)
    {
        // Obtener la canción actual
        $cancion = Cancion::findOrFail($id);
    
        // Obtener la canción anterior basada en el ID actual
        $cancionAnterior = Cancion::where('id', '<', $id)->orderBy('id', 'desc')->first();
    
        // Obtener la siguiente canción basada en el ID actual
        $cancionSiguiente = Cancion::where('id', '>', $id)->orderBy('id')->first();
    
        // Pasar la canción actual, la anterior y la siguiente a la vista
        return view('canciones.show', compact('cancion', 'cancionAnterior', 'cancionSiguiente'));
    }
    

    public function edit(Cancion $cancion)
    {
        Log::info('Editando cancion: ' . $cancion->id);
        return view('canciones.edit', compact('cancion'));
    }

    public function update(Request $request, Cancion $cancion)
    {
        $request->validate([
            'titulo' => 'required|max:255',
            'artista' => 'required|max:255',
            'album' => 'sometimes|max:255',
            'anio' => 'required|digits:4',
            'caratula' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'song_path' => 'sometimes|file|mimes:mp3,wav,aac|max:10000',
        ]);

        if ($request->hasFile('caratula')) {
            Storage::delete($cancion->caratula);
            $caratulaPath = $request->file('caratula')->store('public/caratulas');
            $cancion->caratula = $caratulaPath;
        }

        if ($request->hasFile('song_path')) {
            Storage::delete($cancion->song_path);
            $songPath = $request->file('song_path')->store('public/canciones');
            $cancion->song_path = $songPath;
        }

        $cancion->update($request->except(['caratula', 'song_path']));

        return redirect()->route('admin.canciones.index')->with('success', 'Canción actualizada con éxito.');
    }

    public function destroy(Cancion $cancion)
    {
        Storage::delete([$cancion->caratula, $cancion->song_path]);
        $cancion->delete();
        return redirect()->route('admin.canciones.index')->with('success', 'Canción eliminada con éxito.');
    }
    public function aleatoria()
    {
        $cancion = Cancion::inRandomOrder()->first();
        if (!$cancion) {
            return response()->json(['error' => 'No hay canciones disponibles'], 404);
        }

        return response()->json([
            'titulo' => $cancion->titulo,
            'artista' => $cancion->artista,
            'song_path' => Storage::url($cancion->song_path),
        ]);
    }
}
