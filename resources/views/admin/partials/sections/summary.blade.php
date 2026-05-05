<div class="mt-12 grid grid-cols-1 gap-8 border-t border-neutral-200 pt-10 lg:grid-cols-12">
    <div class="lg:col-span-4">
        <h4 class="font-serif text-2xl">Sumário da introdução</h4>
        <p class="mt-2 text-sm leading-relaxed text-neutral-500">Controla as linhas exibidas abaixo de “Capturando Momentos”.</p>
        <form action="{{ route('admin.sumarios.store') }}" method="POST" class="mt-6 space-y-4 border p-4">
            @csrf
            <input name="numero_ordem" required placeholder="01" class="admin-field">
            <input name="titulo" required placeholder="Editorial" class="admin-field">
            <input name="pagina" required placeholder="P.04" class="admin-field">
            <input name="ordem" type="number" min="0" value="0" placeholder="Ordem" class="admin-field">
            <button type="submit" class="w-full bg-black py-3 font-mono text-xs uppercase tracking-widest text-white">Adicionar item</button>
        </form>
    </div>

    <div class="lg:col-span-8">
        <div class="space-y-3">
            @forelse ($sumarios as $sumario)
                <article class="border border-neutral-200 p-4">
                    <form action="{{ route('admin.sumarios.update', $sumario) }}" method="POST" class="grid grid-cols-1 gap-3 md:grid-cols-5">
                        @csrf
                        @method('PUT')
                        <input name="numero_ordem" required value="{{ old('numero_ordem', $sumario->numero_ordem) }}" class="admin-field">
                        <input name="titulo" required value="{{ old('titulo', $sumario->titulo) }}" class="admin-field md:col-span-2">
                        <input name="pagina" required value="{{ old('pagina', $sumario->pagina) }}" class="admin-field">
                        <input name="ordem" type="number" min="0" value="{{ old('ordem', $sumario->ordem) }}" class="admin-field">
                        <button type="submit" class="bg-black px-3 py-2 font-mono text-[10px] uppercase tracking-widest text-white md:col-start-5">Salvar</button>
                    </form>
                    <form action="{{ route('admin.sumarios.destroy', $sumario) }}" method="POST" class="mt-3 text-right" onsubmit="return confirm('Remover este item do sumário?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="font-mono text-[10px] uppercase tracking-widest text-red-600">Excluir item</button>
                    </form>
                </article>
            @empty
                <div class="border border-dashed border-neutral-300 p-8 text-sm text-neutral-400">Nenhum item criado. O site usa o sumário padrão enquanto estiver vazio.</div>
            @endforelse
        </div>
    </div>
</div>
