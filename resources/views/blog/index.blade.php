@extends('template.app')

@section('content')

<main class="min-h-screen bg-stone-50 text-stone-900">
    <header class="px-6 py-10 md:px-16 md:py-16">
        <a href="{{ url('/') }}#blog" class="font-mono text-xs uppercase tracking-widest text-stone-500 hover:text-black">Voltar ao site</a>
        <h1 class="mt-10 font-serif text-5xl md:text-7xl">Blog da Nick</h1>
        <p class="mt-4 max-w-2xl text-sm leading-relaxed text-stone-600">Todos os artigos publicados pelo administrativo ficam disponíveis aqui.</p>
    </header>

    <section class="px-6 pb-16 md:px-16">
        <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
            @forelse ($artigos as $artigo)
                <a href="{{ route('blog.show', $artigo) }}" class="group block">
                    <div class="overflow-hidden bg-stone-200">
                        @if ($artigo->imagem_capa)
                            <img src="{{ route('media.artigos.cover', $artigo) }}" alt="{{ $artigo->titulo }}" class="aspect-[4/3] w-full object-cover transition-transform duration-700 group-hover:scale-105">
                        @else
                            <div class="flex aspect-[4/3] items-center justify-center text-xs uppercase tracking-widest text-stone-400">Sem capa</div>
                        @endif
                    </div>
                    <span class="mt-5 block font-mono text-[10px] uppercase tracking-widest text-stone-500">{{ $artigo->categoria ?: 'Blog' }} &bull; {{ $artigo->tempo_leitura ?: 'Leitura' }}</span>
                    <h2 class="mt-2 font-serif text-2xl group-hover:underline decoration-stone-300 underline-offset-4">{{ $artigo->titulo }}</h2>
                    <p class="mt-3 text-sm leading-relaxed text-stone-600">{{ $artigo->resumo ?: \Illuminate\Support\Str::limit(strip_tags($artigo->conteudo), 140) }}</p>
                </a>
            @empty
                <div class="border border-dashed border-stone-300 p-10 text-sm text-stone-500 md:col-span-3">Nenhum artigo publicado ainda.</div>
            @endforelse
        </div>
    </section>
</main>

@endsection
