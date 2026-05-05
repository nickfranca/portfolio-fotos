<section id="portfolio" data-admin-section class="admin-section">
    @include('admin.partials.section-title', [
        'number' => '02',
        'eyebrow' => 'Biblioteca',
        'title' => 'Fotos',
        'description' => 'Publique fotos, vincule ao projeto correto e ajuste o enquadramento sem alterar o arquivo original.',
    ])

    <div class="grid grid-cols-1 gap-10 lg:grid-cols-12">
        <div class="lg:col-span-5">
            <h3 class="mb-6 font-serif text-3xl">Publicar no portfólio</h3>

            <form action="{{ route('admin.fotos.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6 border p-5">
                @csrf
                <input type="file" name="imagem" accept="image/*" required class="w-full border border-dashed border-neutral-300 p-4 text-sm">
                <input name="titulo" type="text" value="{{ old('titulo') }}" placeholder="Título" class="admin-field font-serif text-2xl">
                <textarea name="descricao" rows="4" placeholder="Descrição" class="admin-field resize-none text-sm text-neutral-600">{{ old('descricao') }}</textarea>

                <select name="projeto_id" class="w-full border border-neutral-300 px-3 py-2 text-sm focus:border-black focus:outline-none">
                    <option value="">Sem projeto</option>
                    @foreach ($projetos as $projeto)
                        <option value="{{ $projeto->id }}">{{ $projeto->titulo }}</option>
                    @endforeach
                </select>

                @include('admin.partials.sections.photo-framing-controls')

                <div class="grid grid-cols-2 gap-4">
                    <label class="text-sm text-neutral-500">Ordem <input name="ordem" type="number" min="0" value="{{ old('ordem', 0) }}" class="mt-1 w-full border border-neutral-300 px-2 py-1"></label>
                    <label class="flex items-end gap-3 pb-2 text-sm text-neutral-600"><input type="checkbox" name="ativo" value="1" checked class="accent-black"> Visível no site</label>
                </div>

                <button type="submit" class="w-full bg-black py-4 font-mono text-xs uppercase tracking-widest text-white">Salvar foto no site</button>
            </form>
        </div>

        <div class="lg:col-span-7">
            <div class="mb-4 flex items-center justify-between border-b border-neutral-200 pb-4">
                <h3 class="font-serif text-2xl">Fotos publicadas</h3>
                <span class="font-mono text-xs uppercase tracking-widest text-neutral-400">{{ $fotos->count() }} itens</span>
            </div>

            <div class="space-y-4">
                @forelse ($fotos as $foto)
                    <article class="border border-neutral-200 p-4">
                        <form action="{{ route('admin.fotos.update', $foto) }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 gap-4 md:grid-cols-12">
                            @csrf
                            @method('PUT')

                            <div class="md:col-span-3">
                                <img src="{{ route('media.fotos.show', $foto) }}" alt="{{ $foto->titulo }}" class="aspect-[4/5] w-full bg-neutral-50 object-{{ $foto->ajuste === 'contain' ? 'contain' : 'cover' }}" style="object-position: {{ $foto->posicao_x ?? 'center' }} {{ $foto->posicao_y ?? 'center' }};">
                                <a href="{{ route('media.fotos.download', $foto) }}" class="mt-2 inline-block font-mono text-[10px] uppercase tracking-widest text-neutral-500 hover:text-black">Baixar com marca</a>
                                <input type="file" name="imagem" accept="image/*" class="mt-3 w-full text-xs">
                            </div>

                            <div class="space-y-4 md:col-span-7">
                                <input name="titulo" type="text" value="{{ old('titulo', $foto->titulo) }}" placeholder="Título da foto" class="admin-field font-serif text-xl">
                                <textarea name="descricao" rows="3" placeholder="Descrição" class="admin-field resize-none text-sm text-neutral-600">{{ old('descricao', $foto->descricao) }}</textarea>
                                <select name="projeto_id" class="w-full border border-neutral-300 px-3 py-2 text-sm focus:border-black focus:outline-none">
                                    <option value="">Sem projeto</option>
                                    @foreach ($projetos as $projeto)
                                        <option value="{{ $projeto->id }}" @selected($foto->projeto_id === $projeto->id)>{{ $projeto->titulo }}</option>
                                    @endforeach
                                </select>

                                @include('admin.partials.sections.photo-framing-controls', ['foto' => $foto])

                                <div class="flex items-center gap-6">
                                    <label class="text-sm text-neutral-500">Ordem <input name="ordem" type="number" min="0" value="{{ old('ordem', $foto->ordem) }}" class="ml-2 w-20 border border-neutral-300 px-2 py-1"></label>
                                    <label class="flex items-center gap-2 text-sm text-neutral-500"><input type="checkbox" name="ativo" value="1" @checked($foto->ativo) class="accent-black"> Visível</label>
                                </div>
                            </div>

                            <div class="flex items-start gap-2 md:col-span-2 md:flex-col">
                                <button type="submit" class="w-full bg-black px-3 py-2 font-mono text-[10px] uppercase tracking-widest text-white">Salvar</button>
                            </div>
                        </form>

                        <form action="{{ route('admin.fotos.destroy', $foto) }}" method="POST" class="mt-3 text-right" onsubmit="return confirm('Remover esta foto?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="font-mono text-[10px] uppercase tracking-widest text-red-600">Excluir foto</button>
                        </form>
                    </article>
                @empty
                    <div class="border border-dashed border-neutral-300 p-10 text-center text-sm text-neutral-400">Nenhuma foto cadastrada ainda.</div>
                @endforelse
            </div>
        </div>
    </div>
</section>
