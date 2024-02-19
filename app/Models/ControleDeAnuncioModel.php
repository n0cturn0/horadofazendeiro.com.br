<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ControleDeAnuncioModel extends Model
{
    use HasFactory;
    protected $table = 'controleanuncios';
    protected $fillable = [
        'idanuncio', 'idusuario', 'datacriacao', 'datavencimento', 'status'
    ];
}
