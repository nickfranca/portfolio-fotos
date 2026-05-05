<?php

namespace App\Http\Controllers;

use App\Models\Artigo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArtigoController extends Controller
{
    public function index()
    {
        return view('blog.index', [
            'artigos' => Artigo::latest()->get(),
        ]);
    }

    public function show(Artigo $artigo)
    {
        return view('blog.show', [
            'artigo' => $artigo,
            'artigosRelacionados' => Artigo::whereKeyNot($artigo->id)->latest()->take(3)->get(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'titulo' => ['required', 'string', 'max:255'],
            'categoria' => ['nullable', 'string', 'max:255'],
            'resumo' => ['nullable', 'string'],
            'conteudo' => ['required', 'string'],
            'imagem_capa' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            'tempo_leitura' => ['nullable', 'string', 'max:255'],
            'destaque' => ['nullable', 'boolean'],
        ]);

        $data['usuario_id'] = Auth::id();
        $data['slug'] = $this->uniqueSlug($data['titulo']);
        $data['destaque'] = $request->boolean('destaque');

        if ($request->hasFile('imagem_capa')) {
            $data['imagem_capa'] = $request->file('imagem_capa')->store('blog', 'local');
        }

        Artigo::create($data);

        return redirect()->route('admin.index')->with('success', 'Artigo publicado no blog.');
    }

    public function update(Request $request, Artigo $artigo)
    {
        $data = $request->validate([
            'titulo' => ['required', 'string', 'max:255'],
            'categoria' => ['nullable', 'string', 'max:255'],
            'resumo' => ['nullable', 'string'],
            'conteudo' => ['required', 'string'],
            'imagem_capa' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            'tempo_leitura' => ['nullable', 'string', 'max:255'],
            'destaque' => ['nullable', 'boolean'],
        ]);

        if ($artigo->titulo !== $data['titulo']) {
            $data['slug'] = $this->uniqueSlug($data['titulo'], $artigo->id);
        }

        if ($request->hasFile('imagem_capa')) {
            if ($artigo->imagem_capa) {
                Storage::disk('local')->delete($artigo->imagem_capa);
                Storage::disk('public')->delete($artigo->imagem_capa);
            }

            $data['imagem_capa'] = $request->file('imagem_capa')->store('blog', 'local');
        }

        $data['destaque'] = $request->boolean('destaque');

        $artigo->update($data);

        return redirect()->route('admin.index')->with('success', 'Artigo atualizado.');
    }

    public function destroy(Artigo $artigo)
    {
        if ($artigo->imagem_capa) {
            Storage::disk('local')->delete($artigo->imagem_capa);
            Storage::disk('public')->delete($artigo->imagem_capa);
        }

        $artigo->delete();

        return redirect()->route('admin.index')->with('success', 'Artigo removido.');
    }

    private function uniqueSlug(string $title, ?int $ignoreId = null): string
    {
        $base = Str::slug($title) ?: Str::random(8);
        $slug = $base;
        $count = 1;

        while (
            Artigo::where('slug', $slug)
                ->when($ignoreId, fn ($query) => $query->whereKeyNot($ignoreId))
                ->exists()
        ) {
            $slug = "{$base}-{$count}";
            $count++;
        }

        return $slug;
    }
}
