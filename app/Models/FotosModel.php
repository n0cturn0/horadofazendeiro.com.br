<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FotosModel extends Model
{
    use HasFactory;
    protected $table = 'fotos';
    protected $fillable = [
        'arquivo', 'idanuncio' 
    ];
}
