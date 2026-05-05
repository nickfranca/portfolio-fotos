<section id="projetos" data-admin-section class="admin-section is-active">
    @include('admin.partials.section-title', [
        'number' => '01',
        'eyebrow' => 'Organização',
        'title' => 'Projetos',
        'description' => 'Crie os grupos principais do portfólio. Cada projeto tem sua própria biblioteca e aparece como um bloco separado na home.',
    ])

    <div class="grid grid-cols-1 gap-10 lg:grid-cols-12">
        <div class="lg:col-span-4">
            <h3 class="mb-4 font-serif text-3xl">Criar biblioteca</h3>
            <p class="mb-6 text-sm leading-relaxed text-neutral-500">Cada projeto agrupa uma biblioteca de fotos. Depois vincule fotos a ele na tela Fotos.</p>

            <form action="{{ route('admin.projetos.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5 border p-5">
                @csrf
                <input name="titulo" required placeholder="Nome do projeto" class="admin-field font-serif text-xl">
                <input name="tag" placeholder="Tag pequena. Ex: Editorial 01" class="admin-field">
                <textarea name="descricao" rows="4" placeholder="Descrição do projeto" class="w-full resize-none border border-neutral-300 p-3 text-sm focus:border-black focus:outline-none"></textarea>
                <input type="file" name="imagem" accept="image/*" class="w-full border border-dashed border-neutral-300 p-4 text-sm">
                <div class="flex flex-wrap gap-5">
                    <label class="text-sm text-neutral-500">Ordem <input name="ordem" type="number" min="0" value="0" class="ml-2 w-20 border border-neutral-300 px-2 py-1"></label>
                    <label class="flex items-center gap-2 text-sm text-neutral-500"><input type="checkbox" name="ativo" value="1" checked class="accent-black"> Visível</label>
                    <label class="flex items-center gap-2 text-sm text-neutral-500"><input type="checkbox" name="destaque" value="1" class="accent-black"> Destaque</label>
                </div>
                <button type="submit" class="w-full bg-black py-4 font-mono text-xs uppercase tracking-widest text-white">Criar projeto</button>
            </form>
        </div>

        <div class="lg:col-span-8">
            <div class="mb-4 flex items-center justify-between border-b border-neutral-200 pb-4">
                <h3 class="font-serif text-2xl">Projetos cadastrados</h3>
                <span class="font-mono text-xs uppercase tracking-widest text-neutral-400">{{ $projetos->count() }} projetos</span>
            </div>

            <div class="space-y-4">
                @forelse ($projetos as $projeto)
                    <article class="border border-neutral-200 p-4">
                        <form action="{{ route('admin.projetos.update', $projeto) }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 gap-4 md:grid-cols-12">
                            @csrf
                            @method('PUT')
                            <div class="md:col-span-3">
                                @if ($projeto->imagem)
                                    <img src="{{ route('media.projetos.cover', $projeto) }}" alt="{{ $projeto->titulo }}" class="aspect-[4/3] w-full object-cover">
                                @else
                                    <div class="flex aspect-[4/3] items-center justify-center bg-neutral-100 text-xs uppercase tracking-widest text-neutral-400">{{ $projeto->fotos_count }} fotos</div>
                                @endif
                                <input type="file" name="imagem" accept="image/*" class="mt-3 w-full text-xs">
                            </div>

                            <div class="space-y-4 md:col-span-7">
                                <input name="titulo" required value="{{ old('titulo', $projeto->titulo) }}" class="admin-field font-serif text-xl">
                                <input name="tag" value="{{ old('tag', $projeto->tag) }}" placeholder="Tag" class="admin-field text-sm">
                                <textarea name="descricao" rows="3" class="admin-field resize-none text-sm text-neutral-600">{{ old('descricao', $projeto->descricao) }}</textarea>
                                <div class="flex flex-wrap gap-5">
                                    <label class="text-sm text-neutral-500">Ordem <input name="ordem" type="number" min="0" value="{{ old('ordem', $projeto->ordem) }}" class="ml-2 w-20 border border-neutral-300 px-2 py-1"></label>
                                    <label class="flex items-center gap-2 text-sm text-neutral-500"><input type="checkbox" name="ativo" value="1" @checked($projeto->ativo) class="accent-black"> Visível</label>
                                    <label class="flex items-center gap-2 text-sm text-neutral-500"><input type="checkbox" name="destaque" value="1" @checked($projeto->destaque) class="accent-black"> Destaque</label>
                                </div>
                            </div>

                            <div class="flex flex-col gap-2 md:col-span-2">
                                <a href="{{ route('projetos.show', $projeto) }}" target="_blank" class="border border-neutral-300 px-3 py-2 text-center font-mono text-[10px] uppercase tracking-widest">Ver mais</a>
                                <button type="submit" class="bg-black px-3 py-2 font-mono text-[10px] uppercase tracking-widest text-white">Salvar</button>
                            </div>
                        </form>

                        <form action="{{ route('admin.projetos.destroy', $projeto) }}" method="POST" class="mt-3 text-right" onsubmit="return confirm('Remover este projeto? As fotos ficam sem projeto.')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="font-mono text-[10px] uppercase tracking-widest text-red-600">Excluir projeto</button>
                        </form>
                    </article>
                @empty
                    <div class="border border-dashed border-neutral-300 p-10 text-center text-sm text-neutral-400">Nenhum projeto cadastrado ainda.</div>
                @endforelse
            </div>
        </div>
    </div>
</section>
