<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerfilModel extends Model
{
    use HasFactory;
    protected $table = 'perfil';
    protected $fillable = [
        'idusuario', 'idpacote'
    ];

}
