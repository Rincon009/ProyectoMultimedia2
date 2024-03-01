<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo', 'descripcion', 'director', 'fecha_lanzamiento', 'categoria_id', 'caratula', 'movie_path'
    ];
    protected $casts = [
        'fecha_lanzamiento' => 'date',
    ];
    
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
    public function getMoviePathAttribute($value)
    {
        if ($value) {
            return asset('peliculasupload/' . $value);
        }

        return null;
    }

}
