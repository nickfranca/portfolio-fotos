<?php

namespace App\Http\Controllers;

use App\Models\Projeto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProjetoController extends Controller
{
    public function show(Projeto $projeto)
    {
        abort_unless($projeto->ativo, 404);

        return view('projetos.show', [
            'projeto' => $projeto->load(['fotos' => fn ($query) => $query->where('ativo', true)->orderBy('ordem')]),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'tag' => ['nullable', 'string', 'max:255'],
            'titulo' => ['required', 'string', 'max:255'],
            'descricao' => ['nullable', 'string'],
            'imagem' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            'ordem' => ['nullable', 'integer', 'min:0'],
            'ativo' => ['nullable', 'boolean'],
            'destaque' => ['nullable', 'boolean'],
        ]);

        $data['usuario_id'] = Auth::id();
        $data['ordem'] = $data['ordem'] ?? 0;
        $data['ativo'] = $request->boolean('ativo');
        $data['destaque'] = $request->boolean('destaque');

        if ($request->hasFile('imagem')) {
            $data['imagem'] = $request->file('imagem')->store('projetos', 'local');
        }

        Projeto::create($data);

        return redirect()->route('admin.index')->with('success', 'Projeto criado.');
    }

    public function update(Request $request, Projeto $projeto)
    {
        $data = $request->validate([
            'tag' => ['nullable', 'string', 'max:255'],
            'titulo' => ['required', 'string', 'max:255'],
            'descricao' => ['nullable', 'string'],
            'imagem' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            'ordem' => ['nullable', 'integer', 'min:0'],
            'ativo' => ['nullable', 'boolean'],
            'destaque' => ['nullable', 'boolean'],
        ]);

        if ($request->hasFile('imagem')) {
            if ($projeto->imagem) {
                Storage::disk('local')->delete($projeto->imagem);
            }
            $data['imagem'] = $request->file('imagem')->store('projetos', 'local');
        }

        $data['ordem'] = $data['ordem'] ?? 0;
        $data['ativo'] = $request->boolean('ativo');
        $data['destaque'] = $request->boolean('destaque');

        $projeto->update($data);

        return redirect()->route('admin.index')->with('success', 'Projeto atualizado.');
    }

    public function destroy(Projeto $projeto)
    {
        if ($projeto->imagem) {
            Storage::disk('local')->delete($projeto->imagem);
        }

        $projeto->delete();

        return redirect()->route('admin.index')->with('success', 'Projeto removido.');
    }
}
