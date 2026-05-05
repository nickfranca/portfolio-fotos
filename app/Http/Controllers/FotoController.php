<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FotoController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'titulo' => ['nullable', 'string', 'max:255'],
            'descricao' => ['nullable', 'string'],
            'projeto_id' => ['nullable', 'exists:projetos,id'],
            'imagem' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            'ordem' => ['nullable', 'integer', 'min:0'],
            'ativo' => ['nullable', 'boolean'],
            'ajuste' => ['required', 'in:cover,contain'],
            'posicao_x' => ['required', 'in:left,center,right'],
            'posicao_y' => ['required', 'in:top,center,bottom'],
        ]);

        $data['caminho'] = $request->file('imagem')->store('portfolio', 'local');
        $data['ordem'] = $data['ordem'] ?? 0;
        $data['ativo'] = $request->boolean('ativo');

        Foto::create($data);

        return redirect()->route('admin.index')->with('success', 'Foto publicada no portfólio.');
    }

    public function update(Request $request, Foto $foto)
    {
        $data = $request->validate([
            'titulo' => ['nullable', 'string', 'max:255'],
            'descricao' => ['nullable', 'string'],
            'projeto_id' => ['nullable', 'exists:projetos,id'],
            'imagem' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            'ordem' => ['nullable', 'integer', 'min:0'],
            'ativo' => ['nullable', 'boolean'],
            'ajuste' => ['required', 'in:cover,contain'],
            'posicao_x' => ['required', 'in:left,center,right'],
            'posicao_y' => ['required', 'in:top,center,bottom'],
        ]);

        if ($request->hasFile('imagem')) {
            Storage::disk('local')->delete($foto->caminho);
            Storage::disk('public')->delete($foto->caminho);
            $data['caminho'] = $request->file('imagem')->store('portfolio', 'local');
        }

        $data['ordem'] = $data['ordem'] ?? 0;
        $data['ativo'] = $request->boolean('ativo');

        $foto->update($data);

        return redirect()->route('admin.index')->with('success', 'Foto atualizada.');
    }

    public function destroy(Foto $foto)
    {
        Storage::disk('local')->delete($foto->caminho);
        Storage::disk('public')->delete($foto->caminho);
        $foto->delete();

        return redirect()->route('admin.index')->with('success', 'Foto removida.');
    }
}
