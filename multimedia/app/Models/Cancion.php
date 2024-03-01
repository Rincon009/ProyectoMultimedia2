<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cancion extends Model
{
    use HasFactory;

    /**
     * La tabla asociada con el modelo.
     *
     * @var string
     */
    protected $table = 'canciones';

    /**
     * Los atributos que son asignables en masa.
     *
     * @var array
     */
    protected $fillable = [
        'titulo',
        'artista',
        'album',
        'anio',
        'caratula',
        'song_path',
    ];

    /**
     * Los atributos que deben ser convertidos a tipos de datos nativos.
     *
     * @var array
     */
    protected $casts = [
        'anio' => 'integer',
    ];

    
    public function getSongPathAttribute($value)
    {
        return $value ? asset('storage/' . $value) : null;
    }
}
