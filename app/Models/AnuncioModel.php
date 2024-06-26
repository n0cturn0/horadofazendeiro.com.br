<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnuncioModel extends Model
{
    use HasFactory;
    protected $table = 'anuncio';
    protected $fillable = [
        'titulo', 'cidade', 'estado', 'datacriacao', 'precotipo', 'preco', 'anuncio'
    ];
}
