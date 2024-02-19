<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerfilControlleModel extends Model
{
    use HasFactory;
    protected $table = 'prefilcontrole';
    protected $fillable = [
        'idusuario', 'totalauncios'
    ];
}
