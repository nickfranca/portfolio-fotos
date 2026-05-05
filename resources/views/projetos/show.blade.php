@extends('template.app')

@section('content')

<main class="min-h-screen bg-white text-neutral-900">
    <header class="px-6 py-8 md:px-16 md:py-12 border-b border-neutral-100">
        <a href="{{ url('/') }}#portfolio" class="font-mono text-xs uppercase tracking-widest text-neutral-400 hover:text-black">Voltar ao portfólio</a>
        <div class="mt-12 max-w-4xl">
            <span class="font-mono text-xs uppercase tracking-[0.25em] text-neutral-400">{{ $projeto->tag ?: 'Projeto' }}</span>
            <h1 class="mt-3 font-serif text-5xl md:text-7xl">{{ $projeto->titulo }}</h1>
            @if ($projeto->descricao)
                <p class="mt-6 max-w-2xl text-base leading-relaxed text-neutral-600">{{ $projeto->descricao }}</p>
            @endif
        </div>
    </header>

    <section class="px-6 py-12 md:px-16">
        <div class="mb-8 flex items-end justify-between border-b border-neutral-100 pb-5">
            <h2 class="font-serif text-3xl">Biblioteca de fotos</h2>
            <span class="font-mono text-xs uppercase tracking-widest text-neutral-400">{{ $projeto->fotos->count() }} fotos</span>
        </div>

        <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
            @forelse ($projeto->fotos as $foto)
                <article class="group">
                    <div class="relative overflow-hidden bg-neutral-100">
                        <img src="{{ route('media.fotos.show', $foto) }}" alt="{{ $foto->titulo }}" class="aspect-[4/5] w-full bg-neutral-50 object-{{ $foto->ajuste === 'contain' ? 'contain' : 'cover' }} transition-transform duration-700 group-hover:scale-105" style="object-position: {{ $foto->posicao_x ?? 'center' }} {{ $foto->posicao_y ?? 'center' }};">
                        <a href="{{ route('media.fotos.download', $foto) }}" class="absolute bottom-3 right-3 bg-white/90 px-3 py-2 font-mono text-[10px] uppercase tracking-widest opacity-0 transition-opacity group-hover:opacity-100">Baixar</a>
                    </div>
                    <div class="mt-4">
                        <h3 class="font-serif text-xl">{{ $foto->titulo ?: 'Sem título' }}</h3>
                        @if ($foto->descricao)
                            <p class="mt-2 text-sm leading-relaxed text-neutral-500">{{ $foto->descricao }}</p>
                        @endif
                    </div>
                </article>
            @empty
                @if ($projeto->imagem)
                    <article class="group md:col-span-2">
                        <div class="relative overflow-hidden bg-neutral-100">
                            <img src="{{ route('media.projetos.cover', $projeto) }}" alt="{{ $projeto->titulo }}" class="aspect-[16/10] w-full object-contain">
                        </div>
                        <div class="mt-4">
                            <h3 class="font-serif text-xl">Capa do projeto</h3>
                            <p class="mt-2 text-sm leading-relaxed text-neutral-500">Adicione fotos a este projeto no administrativo para montar a biblioteca completa.</p>
                        </div>
                    </article>
                @else
                    <div class="border border-dashed border-neutral-200 p-10 text-sm text-neutral-400 md:col-span-3">
                        Este projeto ainda não tem fotos publicadas. No administrativo, edite uma foto e selecione este projeto no campo Projeto.
                    </div>
                @endif
            @endforelse
        </div>
    </section>
</main>

@endsection
