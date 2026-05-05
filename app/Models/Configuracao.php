<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Configuracao extends Model
{
    use HasFactory;

    protected $table = 'configuracaos';

    protected $fillable = [
        'chave',
        'valor'
    ];

    public static function mapa(): array
    {
        return static::pluck('valor', 'chave')->all();
    }

    public static function valor(string $chave, ?string $padrao = null): ?string
    {
        return static::where('chave', $chave)->value('valor') ?? $padrao;
    }
}
