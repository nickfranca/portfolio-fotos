<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Projeto extends Model
{
    //
    use HasFactory;
    
    protected $table = 'projetos';

    protected $fillable = [
        'usuario_id',
        'tag',
        'titulo',
        'descricao',
        'imagem',
        'destaque',
    ];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
}

