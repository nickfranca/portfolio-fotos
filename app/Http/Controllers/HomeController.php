<?php

namespace App\Http\Controllers;

use App\Models\Artigo;
use App\Models\Configuracao;
use App\Models\Foto;
use App\Models\Projeto;
use App\Models\Sumario;

class HomeController extends Controller
{
    public function index()
    {
        return view('index', [
            'fotos' => Foto::where('ativo', true)->orderBy('ordem')->latest()->get(),
            'projetos' => Projeto::with(['fotos' => fn ($query) => $query->where('ativo', true)->orderBy('ordem')])
                ->where('ativo', true)
                ->orderBy('ordem')
                ->latest()
                ->get(),
            'artigosDestaque' => Artigo::where('destaque', true)->latest()->get(),
            'artigos' => Artigo::latest()->get(),
            'configuracoes' => Configuracao::mapa(),
            'sumarios' => Sumario::orderBy('ordem')->get(),
        ]);
    }
}
