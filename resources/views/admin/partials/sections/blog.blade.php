<section id="blog" data-admin-section class="admin-section">
    @include('admin.partials.section-title', [
        'number' => '03',
        'eyebrow' => 'Publicação',
        'title' => 'Blog',
        'description' => 'Crie chamadas e textos completos. A listagem pública fica em “Ver todos os posts”.',
    ])

    <div class="grid grid-cols-1 gap-10 lg:grid-cols-12">
        <div class="lg:col-span-5">
            <h3 class="mb-6 font-serif text-3xl">Publicar no blog</h3>
            <div class="mb-5 border border-neutral-200 bg-neutral-100 p-4 text-sm leading-relaxed text-neutral-600">
                O rascunho deste formulário é salvo no navegador enquanto você escreve.
            </div>

            <form action="{{ route('admin.artigos.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6 border p-5" data-draft-form="artigo-novo">
                @csrf
                <input name="titulo" type="text" required value="{{ old('titulo') }}" placeholder="Título" class="admin-field font-serif text-2xl" data-draft-field>
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                    <input name="categoria" type="text" value="{{ old('categoria') }}" placeholder="Categoria" class="admin-field" data-draft-field>
                    <input name="tempo_leitura" type="text" value="{{ old('tempo_leitura') }}" placeholder="5 min" class="admin-field" data-draft-field>
                </div>
                <textarea name="resumo" rows="3" placeholder="Resumo" class="admin-field resize-none text-sm text-neutral-600" data-draft-field>{{ old('resumo') }}</textarea>
                <textarea name="conteudo" rows="8" required placeholder="Texto completo" class="w-full resize-y border border-neutral-300 p-3 text-sm leading-relaxed text-neutral-700 focus:border-black focus:outline-none" data-draft-field>{{ old('conteudo') }}</textarea>
                <input name="imagem_capa" type="file" accept="image/*" class="w-full border border-dashed border-neutral-300 p-4 text-sm">
                <label class="flex items-center gap-3 text-sm text-neutral-600"><input type="checkbox" name="destaque" value="1" class="accent-black"> Destacar como principal no blog</label>
                <button type="submit" class="w-full bg-black py-4 font-mono text-xs uppercase tracking-widest text-white">Salvar artigo no blog</button>
            </form>
        </div>

        <div class="lg:col-span-7">
            <div class="mb-4 flex items-center justify-between border-b border-neutral-200 pb-4">
                <h3 class="font-serif text-2xl">Artigos publicados</h3>
                <span class="font-mono text-xs uppercase tracking-widest text-neutral-400">{{ $artigos->count() }} posts</span>
            </div>

            <div class="space-y-5">
                @forelse ($artigos as $artigo)
                    <article class="border border-neutral-200 p-4">
                        <form action="{{ route('admin.artigos.update', $artigo) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                            @csrf
                            @method('PUT')
                            <div class="grid grid-cols-1 gap-4 md:grid-cols-12">
                                <div class="md:col-span-4">
                                    @if ($artigo->imagem_capa)
                                        <img src="{{ route('media.artigos.cover', $artigo) }}" alt="{{ $artigo->titulo }}" class="aspect-[4/3] w-full object-cover">
                                    @else
                                        <div class="flex aspect-[4/3] items-center justify-center bg-neutral-100 text-xs uppercase tracking-widest text-neutral-400">Sem capa</div>
                                    @endif
                                    <input type="file" name="imagem_capa" accept="image/*" class="mt-3 w-full text-xs">
                                </div>

                                <div class="space-y-4 md:col-span-8">
                                    <input name="titulo" type="text" required value="{{ old('titulo', $artigo->titulo) }}" class="admin-field font-serif text-xl">
                                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                                        <input name="categoria" type="text" value="{{ old('categoria', $artigo->categoria) }}" placeholder="Categoria" class="admin-field text-sm">
                                        <input name="tempo_leitura" type="text" value="{{ old('tempo_leitura', $artigo->tempo_leitura) }}" placeholder="Tempo de leitura" class="admin-field text-sm">
                                    </div>
                                    <textarea name="resumo" rows="2" placeholder="Resumo" class="admin-field resize-none text-sm text-neutral-600">{{ old('resumo', $artigo->resumo) }}</textarea>
                                    <textarea name="conteudo" rows="5" required placeholder="Texto completo" class="w-full resize-y border border-neutral-300 p-3 text-sm leading-relaxed text-neutral-700 focus:border-black focus:outline-none">{{ old('conteudo', $artigo->conteudo) }}</textarea>
                                    <label class="flex items-center gap-2 text-sm text-neutral-500"><input type="checkbox" name="destaque" value="1" @checked($artigo->destaque) class="accent-black"> Destaque principal</label>
                                </div>
                            </div>
                            <div class="flex justify-end">
                                <button type="submit" class="bg-black px-5 py-2 font-mono text-[10px] uppercase tracking-widest text-white">Salvar artigo</button>
                            </div>
                        </form>

                        <form action="{{ route('admin.artigos.destroy', $artigo) }}" method="POST" class="mt-3 text-right" onsubmit="return confirm('Remover este artigo?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="font-mono text-[10px] uppercase tracking-widest text-red-600">Excluir artigo</button>
                        </form>
                    </article>
                @empty
                    <div class="border border-dashed border-neutral-300 p-10 text-center text-sm text-neutral-400">Nenhum artigo cadastrado ainda.</div>
                @endforelse
            </div>
        </div>
    </div>
</section>
