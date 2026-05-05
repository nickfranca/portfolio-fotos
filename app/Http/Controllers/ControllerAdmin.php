<?php

namespace App\Http\Controllers;

use App\Models\Artigo;
use App\Models\Configuracao;
use App\Models\Foto;
use App\Models\Projeto;
use App\Models\Sumario;
use App\Models\User;
use Illuminate\Http\Request;

class ControllerAdmin extends Controller
{
    public function login_admin(){
        return view('admin.login');
    }

    public function index(){
        return view('admin.index', [
            'fotos' => Foto::orderBy('ordem')->latest()->get(),
            'projetos' => Projeto::withCount('fotos')->orderBy('ordem')->latest()->get(),
            'artigos' => Artigo::latest()->get(),
            'configuracoes' => Configuracao::mapa(),
            'sumarios' => Sumario::orderBy('ordem')->get(),
            'usuarios' => User::orderBy('nome')->get(),
        ]);
    }
}
