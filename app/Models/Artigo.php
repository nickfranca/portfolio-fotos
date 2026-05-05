<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Artigo extends Model
{
    use HasFactory;
    
    protected $table = 'artigos';

    protected $fillable = [
        'usuario_id',
        'slug',
        'titulo',
        'categoria',
        'resumo',
        'conteudo',
        'imagem_capa',
        'tempo_leitura',
        'destaque'
    ];

    protected $casts = [
        'destaque' => 'boolean',
    ];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
}
