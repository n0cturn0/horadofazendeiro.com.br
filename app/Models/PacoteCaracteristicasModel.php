<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PacoteCaracteristicasModel extends Model
{
    use HasFactory;
    protected $table = 'pacotecaracteristica';
    protected $fillable = ['idpacote', 'caracteristica', 'status'];

}
