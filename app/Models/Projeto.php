<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
        'ordem',
        'ativo',
        'destaque',
    ];

    protected $casts = [
        'ativo' => 'boolean',
        'destaque' => 'boolean',
        'ordem' => 'integer',
    ];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    public function fotos(): HasMany
    {
        return $this->hasMany(Foto::class, 'projeto_id')->orderBy('ordem');
    }
}
