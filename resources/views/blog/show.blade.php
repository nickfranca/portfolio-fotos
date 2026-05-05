@extends('template.app')

@section('content')

<article class="min-h-screen bg-white text-neutral-900">
    <header class="px-6 py-10 md:px-16 md:py-16">
        <a href="{{ route('blog.index') }}" class="font-mono text-xs uppercase tracking-widest text-neutral-400 hover:text-black">Todos os artigos</a>
        <div class="mt-10 max-w-4xl">
            <span class="font-mono text-xs uppercase tracking-widest text-neutral-500">{{ $artigo->categoria ?: 'Blog' }} &bull; {{ $artigo->created_at->format('d/m/Y') }}</span>
            <h1 class="mt-4 font-serif text-5xl leading-tight md:text-7xl">{{ $artigo->titulo }}</h1>
            @if ($artigo->resumo)
                <p class="mt-6 max-w-2xl text-lg leading-relaxed text-neutral-600">{{ $artigo->resumo }}</p>
            @endif
        </div>
    </header>

    @if ($artigo->imagem_capa)
        <img src="{{ route('media.artigos.cover', $artigo) }}" alt="{{ $artigo->titulo }}" class="h-[60vh] w-full object-cover">
    @endif

    <div class="mx-auto max-w-3xl px-6 py-14 text-base leading-8 text-neutral-700 md:px-0">
        {!! nl2br(e($artigo->conteudo)) !!}
    </div>
</article>

@endsection
