<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PacoteModel extends Model
{
    use HasFactory;
    protected $table = 'pacote';
    protected $fillable = ['pacote', 'valor', 'quantidade', 'diasativos'];



    public function joinCaracteristicas()
    {
        return $this->join('pacotecaracteristica', 'pacote.id', '=', 'pacotecaracteristica.idpacote');
    }

}
