<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cancion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminCancionesController extends Controller
{
    /**
     * Muestra un listado de las canciones.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $canciones = Cancion::all();
        return view('admin.canciones.index', compact('canciones'));
    }

    /**
     * Muestra el formulario para crear una nueva canción.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.canciones.create');
    }

    /**
     * Guarda una nueva canción en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|max:255',
            'artista' => 'required|max:255',
            'album' => 'nullable|max:255',
            'anio' => 'required|digits:4',
            'caratula' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'song_path' => 'required|file|mimes:mp3,wav,aac|max:10240',
        ]);

        // Almacenamiento de carátula
        $caratulaNombre = time().'_'.$request->file('caratula')->getClientOriginalName();
        $request->file('caratula')->move(public_path('caratulasupload'), $caratulaNombre);

        // Almacenamiento de canción
        $songNombre = time().'_'.$request->file('song_path')->getClientOriginalName();
        $request->file('song_path')->move(public_path('cancionesupload'), $songNombre);

        Cancion::create([
            'titulo' => $request->titulo,
            'artista' => $request->artista,
            'album' => $request->album,
            'anio' => $request->anio,
            'caratula' => 'caratulasupload/'.$caratulaNombre,
            'song_path' => 'cancionesupload/'.$songNombre,
        ]);

        return redirect()->route('admin.canciones.index')->with('success', 'Canción creada con éxito.');
    }
    /**
     * Muestra una canción específica.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cancion = Cancion::findOrFail($id);
        return view('admin.canciones.show', compact('cancion'));
    }

    /**
     * Muestra el formulario para editar una canción existente.
     *
     * @param  \App\Models\Cancion  $cancion
     * @return \Illuminate\Http\Response
     */
    public function edit(Cancion $cancion)
    {
        return view('admin.canciones.edit', compact('cancion'));
    }

    /**
     * Actualiza una canción en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cancion  $cancion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cancion $cancion)
    {
        $request->validate([
            'titulo' => 'required|max:255',
            'artista' => 'required|max:255',
            'album' => 'nullable|max:255',
            'anio' => 'required|digits:4',
            'caratula' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'song_path' => 'sometimes|file|mimes:mp3,wav,aac|max:10240',
        ]);

        $data = $request->only(['titulo', 'artista', 'album', 'anio']);

        if ($request->hasFile('caratula')) {
            Storage::delete($cancion->caratula);
            $data['caratula'] = $request->caratula->store('caratulasupload');
        }

        if ($request->hasFile('song_path')) {
            Storage::delete($cancion->song_path);
            $data['song_path'] = $request->song_path->store('cancionesupload');
        }

        $cancion->update($data);

        return redirect()->route('admin.canciones.index')->with('success', 'Canción actualizada con éxito.');
    }

    /**
     * Elimina una canción de la base de datos.
     *
     * @param  \App\Models\Cancion  $cancion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cancion $cancion)
    {
        if ($cancion->caratula) {
            Storage::delete($cancion->caratula);
        }

        if ($cancion->song_path) {
            Storage::delete($cancion->song_path);
        }

        $cancion->delete();
        return redirect()->route('admin.canciones.index')->with('success', 'Canción eliminada con éxito.');
    }
}
