<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth'); // Asegura que este controlador requiera autenticación
    }

    /**
     * Muestra la página de inicio de la aplicación.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home'); // Asegúrate de tener una vista 'home.blade.php' en el directorio 'resources/views'
    }
}
