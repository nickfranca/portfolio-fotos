<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sumario extends Model
{
    use HasFactory;

    protected $table = 'sumarios';

    protected $fillable = [
        'numero_ordem',
        'titulo',
        'pagina',
        'ordem'
    ];

    protected $casts = [
        'ordem' => 'integer',
    ];
}
