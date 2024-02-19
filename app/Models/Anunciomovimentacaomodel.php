<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anunciomovimentacaomodel extends Model
{
    use HasFactory;
    protected $table = 'anunciomoviento'; 

    protected $fillable = [
        'idanuncio',
        'idusuario',
        'datacriacao',
        'datavencimento',
        'status',
        'datapagamento',
        'informacao',
        'payment_status',
        'payment_status_detail',
        'payment_id',
        'payment_ticket_url',
        'payment_qrcode',
        'idempotencykey',
    ];
    protected $dates = [
        'datacriacao',
        'datavencimento',
        'datapagamento',
        'created_at',
        'updated_at',
    ];
}
