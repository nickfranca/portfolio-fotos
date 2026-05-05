<?php

namespace App\Http\Controllers;

use App\Models\Sumario;
use Illuminate\Http\Request;

class SumarioController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'numero_ordem' => ['required', 'string', 'max:20'],
            'titulo' => ['required', 'string', 'max:255'],
            'pagina' => ['required', 'string', 'max:50'],
            'ordem' => ['nullable', 'integer', 'min:0'],
        ]);

        $data['ordem'] = $data['ordem'] ?? 0;

        Sumario::create($data);

        return redirect()->route('admin.index')->with('success', 'Item do sumário criado.');
    }

    public function update(Request $request, Sumario $sumario)
    {
        $data = $request->validate([
            'numero_ordem' => ['required', 'string', 'max:20'],
            'titulo' => ['required', 'string', 'max:255'],
            'pagina' => ['required', 'string', 'max:50'],
            'ordem' => ['nullable', 'integer', 'min:0'],
        ]);

        $data['ordem'] = $data['ordem'] ?? 0;
        $sumario->update($data);

        return redirect()->route('admin.index')->with('success', 'Item do sumário atualizado.');
    }

    public function destroy(Sumario $sumario)
    {
        $sumario->delete();

        return redirect()->route('admin.index')->with('success', 'Item do sumário removido.');
    }
}
