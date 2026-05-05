@extends('template.app')

@section('content')

@php
    $configuracoes = $configuracoes ?? [];
    $cfg = fn (string $key, string $default = '') => $configuracoes[$key] ?? $default;
    $coverFoto = $fotos->firstWhere('id', (int) $cfg('cover_foto_id', '0'));
    $introFoto = $fotos->firstWhere('id', (int) $cfg('intro_foto_id', '0'));
    $siteBg = $cfg('site_bg_color', '#f5f5f5');
    $siteText = $cfg('site_text_color', '#171717');
    $siteAccent = $cfg('site_accent_color', '#000000');
    $sumarios = $sumarios ?? collect();
@endphp

<div class="font-sans selection:bg-black selection:text-white overflow-x-hidden" style="background-color: {{ $siteBg }}; color: {{ $siteText }};">

    <section class="h-screen flex flex-col relative group">
        <div class="h-[45vh] bg-black text-white flex flex-col justify-center px-8 md:px-20 relative z-10">
            <span class="text-xs tracking-[0.3em] uppercase opacity-60 mb-4 animate-fade-in-up">{{ $cfg('site_label', 'Portfolio 2025') }}</span>
            <h1 class="text-6xl md:text-8xl font-serif font-medium leading-none tracking-tight animate-fade-in-up delay-100">
                {{ $cfg('hero_title', 'Photography') }}<br>
                <i class="font-light opacity-80">{{ $cfg('hero_highlight', 'Portfolio') }}</i>
            </h1>
            <p class="mt-6 text-sm tracking-widest uppercase border-t border-white/20 pt-4 w-32 animate-fade-in-up delay-200">
                {{ $cfg('hero_subtitle', 'By Nick') }}
            </p>

            <div class="absolute right-8 top-8 md:right-20 md:top-20 border border-white/20 p-2 w-24 h-24 flex items-center justify-center rounded-full hover:rotate-90 transition-transform duration-700 cursor-pointer">
                <span class="text-[0.6rem] text-center uppercase tracking-widest leading-relaxed">
                    {!! nl2br(e($cfg('hero_badge', "Est.\n2025\nEdition"))) !!}
                </span>
            </div>
        </div>
        <div class="flex-1 bg-neutral-200 relative overflow-hidden">
             <img 
                src="{{ $coverFoto ? route('media.fotos.show', $coverFoto) : $cfg('cover_image_url', 'https://images.unsplash.com/photo-1470338229081-eb5980be28c9?fm=jpg&q=60&w=3000&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1yZWxhdGVkfDE1fHx8ZW58MHx8fHx8') }}" 
                alt="Capa Textura"
                class="w-full h-full object-cover grayscale opacity-95 group-hover:scale-105 group-hover:grayscale-0 transition-all duration-1000 ease-out"
            >
            <div class="absolute bottom-10 left-1/2 -translate-x-1/2 animate-bounce">
                <svg class="w-6 h-6 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path></svg>
            </div>
        </div>
    </section>
    

    <section class="min-h-screen py-20 px-6 md:px-20 bg-white">
        
        <div class="flex justify-between items-end mb-16 border-b border-black/10 pb-6">
            <h2 class="text-4xl font-serif text-black">{{ $cfg('works_title', 'Nossos Trabalhos') }}</h2>
            <span class="text-xs font-mono uppercase tracking-widest hidden md:block">{{ $cfg('works_index_label', 'Index') }} / {{ $cfg('works_index_value', str_pad($fotos->count() ?: 4, 2, '0', STR_PAD_LEFT)) }}</span>
        </div>
        @if (($projetos ?? collect())->isNotEmpty())
            <div class="space-y-16">
                @foreach ($projetos as $projeto)
                    @php
                        $fotoPrincipal = $projeto->fotos->first();
                        $fotosProjeto = $projeto->fotos->skip(1)->take(3);
                    @endphp

                    <article class="border-b border-black/10 pb-14 last:border-b-0">
                        <div class="mb-6 flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
                            <div>
                                <span class="text-xs font-bold uppercase tracking-widest border-b border-black pb-1">{{ $projeto->tag ?: 'Project ' . str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                                <h3 class="text-3xl md:text-4xl font-serif mt-4 mb-2">{{ $projeto->titulo }}</h3>
                                <p class="text-sm text-neutral-500 max-w-xl">{{ $projeto->descricao ?: 'Biblioteca fotográfica publicada pelo painel administrativo.' }}</p>
                            </div>
                            <a href="{{ route('projetos.show', $projeto) }}" class="w-fit border px-6 py-3 font-mono text-xs uppercase tracking-widest transition-colors hover:bg-black hover:text-white" style="border-color: {{ $siteAccent }};">Ver mais</a>
                        </div>

                        <div class="grid grid-cols-1 gap-4 md:grid-cols-12 md:auto-rows-[260px]">
                            <a href="{{ route('projetos.show', $projeto) }}" class="group relative overflow-hidden bg-neutral-50 md:col-span-6 md:row-span-2">
                                @if ($fotoPrincipal)
                                    <img src="{{ route('media.fotos.show', $fotoPrincipal) }}" alt="{{ $projeto->titulo }}" class="h-full min-h-[420px] w-full bg-neutral-50 object-{{ $fotoPrincipal->ajuste === 'contain' ? 'contain' : 'cover' }} grayscale transition-all duration-700 group-hover:scale-105 group-hover:grayscale-0" style="object-position: {{ $fotoPrincipal->posicao_x ?? 'center' }} {{ $fotoPrincipal->posicao_y ?? 'center' }};">
                                @elseif ($projeto->imagem)
                                    <img src="{{ route('media.projetos.cover', $projeto) }}" alt="{{ $projeto->titulo }}" class="h-full min-h-[420px] w-full object-cover grayscale transition-all duration-700 group-hover:scale-105 group-hover:grayscale-0">
                                @else
                                    <div class="flex h-full min-h-[420px] items-center justify-center text-xs uppercase tracking-widest text-neutral-300">Sem imagem</div>
                                @endif
                                <span class="absolute bottom-3 right-3 bg-white/90 px-3 py-2 font-mono text-[10px] uppercase tracking-widest opacity-0 transition-opacity group-hover:opacity-100">Abrir biblioteca</span>
                            </a>

                            <div class="grid grid-cols-2 gap-4 md:col-span-6 md:row-span-2">
                                @foreach ($fotosProjeto as $foto)
                                    <a href="{{ route('projetos.show', $projeto) }}" class="group relative overflow-hidden bg-neutral-100">
                                        <img src="{{ route('media.fotos.show', $foto) }}" alt="{{ $foto->titulo ?: $projeto->titulo }}" class="h-full min-h-[200px] w-full bg-neutral-50 object-{{ $foto->ajuste === 'contain' ? 'contain' : 'cover' }} transition-opacity duration-300 group-hover:opacity-80" style="object-position: {{ $foto->posicao_x ?? 'center' }} {{ $foto->posicao_y ?? 'center' }};">
                                        <span class="absolute top-2 left-2 bg-white px-2 py-1 text-[10px] opacity-0 transition-opacity group-hover:opacity-100">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                                    </a>
                                @endforeach

                                <div class="bg-black text-white p-6 flex flex-col justify-center items-center text-center">
                                    <p class="font-serif italic text-lg">"{{ $cfg('portfolio_quote', 'A fotografia é a história que não consigo expressar em palavras.') }}"</p>
                                    <span class="text-[10px] uppercase mt-4 tracking-widest">— {{ $cfg('portfolio_quote_author', 'Destin Sparks') }}</span>
                                </div>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        @else
        <div class="grid grid-cols-1 md:grid-cols-12 gap-4 md:gap-8 auto-rows-[300px]">
            <div class="col-span-1 md:col-span-6 row-span-2 bg-neutral-50 p-8 flex flex-col justify-between group hover:bg-neutral-100 transition-colors">
                <div>
                    <span class="text-xs font-bold uppercase tracking-widest border-b border-black pb-1">Project 01</span>
                    <h3 class="text-3xl font-serif mt-4 mb-2">Nature Shadows</h3>
                    <p class="text-sm text-neutral-500 max-w-xs">Registros das obras da Natureza.</p>
                </div>
                <div class="h-64 overflow-hidden mt-6 relative">
                    <img src="https://s2-g1.glbimg.com/c1tS_axTjV_qDkmMeMs3wYZCgGY=/0x0:5472x3648/1008x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_59edd422c0c84a879bd37670ae4f538a/internal_photos/bs/2017/H/v/pTatikTlSIWRuTzd0JwA/j9a6180.jpg" class="w-full h-full object-cover hover:opacity-80 transition-opacity duration-300" class="w-full h-full object-cover grayscale group-hover:scale-105 transition-transform duration-700">
                </div>
            </div>
            <div class="col-span-1 md:col-span-6 row-span-2 grid grid-cols-2 gap-4">
                
                <div class="bg-gray-200 overflow-hidden relative group">
                    <img src="https://kikacastro.com.br/wp-content/uploads/2022/08/under-16-winner-800x496-1.jpg" class="w-full h-full object-cover hover:opacity-80 transition-opacity duration-300">
                    <span class="absolute top-2 left-2 text-[10px] bg-white px-2 py-1 opacity-0 group-hover:opacity-100 transition-opacity">01</span>
                </div>
                
                <div class="bg-gray-200 overflow-hidden relative group">
                    <img src="https://s2.glbimg.com/Sdia9HsRP4V_FCb874if-ml_4is=/620x520/e.glbimg.com/og/ed/f/original/2020/08/11/31669212-8603391-a_king_eidar_duck_bathing_in_some_shallow_water-a-28_1596787696775.jpg" class="w-full h-full object-cover hover:opacity-80 transition-opacity duration-300">
                     <span class="absolute top-2 left-2 text-[10px] bg-white px-2 py-1 opacity-0 group-hover:opacity-100 transition-opacity">02</span>
                </div>
                
                <div class="bg-gray-200 overflow-hidden relative group">
                    <img src="https://mediatalks.uol.com.br/wp-content/uploads/2023/12/Sapo-flores-Wikicommons-fotografia-de-natureza-e1673630178143.jpg">
                     <span class="absolute top-2 left-2 text-[10px] bg-white px-2 py-1 opacity-0 group-hover:opacity-100 transition-opacity">03</span>
                </div>

                <div class="bg-black text-white p-6 flex flex-col justify-center items-center text-center">
                    <p class="font-serif italic text-lg">"{{ $cfg('portfolio_quote', 'A fotografia é a história que não consigo expressar em palavras.') }}"</p>
                    <span class="text-[10px] uppercase mt-4 tracking-widest">— {{ $cfg('portfolio_quote_author', 'Destin Sparks') }}</span>
                </div>
            </div>

        </div>
        @endif
    </section>

    <section class="min-h-screen flex flex-col md:flex-row">

        <div class="w-full md:w-1/2 bg-black text-white p-12 md:p-24 flex flex-col justify-between relative overflow-hidden">
            <div class="absolute top-24 left-4 md:left-10 origin-bottom-left -rotate-90 translate-y-full hidden md:block">
                <span class="text-xs uppercase tracking-[0.4em] text-neutral-500">{{ $cfg('intro_label', 'Introdução') }}</span>
            </div>

            <div class="md:pl-12 z-10">
                <h2 class="text-4xl md:text-5xl font-serif mb-8 leading-tight">
                    {{ $cfg('intro_title', 'Capturando') }}<br>
                    <span class="italic text-neutral-400">{{ $cfg('intro_highlight', 'Momentos') }}</span>
                </h2>
                <div class="w-12 h-0.5 bg-white/20 mb-8"></div>
                <p class="text-neutral-400 font-light text-sm leading-relaxed max-w-sm text-justify">
                    {{ $cfg('intro_text', 'A fotografia não é sobre câmeras e lentes. É sobre a essência, a luz e a sombra que dançam juntas em um momento efêmero. Este portfólio é uma curadoria de instantes congelados no tempo.') }}
                </p>
            </div>

            <div class="mt-16 md:mt-0 md:pl-12 border-l border-white/10 pl-6 space-y-2 text-sm text-neutral-500 font-mono">
                @forelse ($sumarios as $sumario)
                    <p>{{ $sumario->numero_ordem }}. {{ $sumario->titulo }} ............ {{ $sumario->pagina }}</p>
                @empty
                    <p>01. Editorial ............ P.04</p>
                    <p>02. Landscape ............ P.08</p>
                    <p>03. Portraits ............ P.12</p>
                @endforelse
            </div>
        </div>
        <div class="w-full md:w-1/2 bg-neutral-100 p-8 md:p-12 flex items-center justify-center relative">
            <div class="w-full h-[80%] bg-white shadow-2xl overflow-hidden relative group">
                <img 
                    src="{{ $introFoto ? route('media.fotos.show', $introFoto) : $cfg('intro_image_url', 'https://conafer.org.br/wp-content/uploads/2024/10/image2-4.png') }}" 
                    alt="Intro Portrait"
                    class="w-full h-full object-cover filter grayscale contrast-125 group-hover:grayscale-0 transition-all duration-700"
                >
                <div class="absolute bottom-0 left-0 bg-white p-4 max-w-xs transform translate-y-full group-hover:translate-y-0 transition-transform duration-500 border-t border-black">
                    <p class="font-serif text-lg italic">{{ $cfg('intro_hover_title', 'The Gaze') }}</p>
                    <p class="text-[10px] uppercase tracking-widest mt-1">{{ $cfg('intro_hover_subtitle', 'Studio Session • 2024') }}</p>
                </div>
            </div>
        </div>
    </section>

    <section class="min-h-screen py-24 px-6 md:px-20 bg-stone-50">
        <div class="text-center max-w-2xl mx-auto mb-20">
            <span class="text-xs font-mono text-stone-500 uppercase tracking-[0.3em] mb-4 block">Journal & Insights</span>
            <h2 class="text-5xl md:text-6xl font-serif text-stone-900 mb-6">Blog da Nick</h2>
            <div class="w-12 h-1 bg-black mx-auto"></div>
        </div>

        <div class="max-w-7xl mx-auto flex flex-col gap-16">
            @if ($artigos->isNotEmpty())
                @php
                    $artigoPrincipal = $artigosDestaque->first() ?? $artigos->first();
                    $artigosLista = $artigos->where('id', '!=', $artigoPrincipal->id)->take(3);
                @endphp

                <article class="group grid grid-cols-1 md:grid-cols-12 gap-8 items-center">
                    <div class="md:col-span-7 relative overflow-hidden rounded-sm bg-stone-200">
                        @if ($artigoPrincipal->imagem_capa)
                            <img src="{{ route('media.artigos.cover', $artigoPrincipal) }}" class="w-full aspect-[16/9] object-cover transition-transform duration-700 group-hover:scale-105" alt="{{ $artigoPrincipal->titulo }}">
                        @else
                            <div class="flex aspect-[16/9] items-center justify-center text-xs uppercase tracking-widest text-stone-400">Sem foto principal</div>
                        @endif
                    </div>

                    <div class="md:col-span-5 flex flex-col gap-4 md:pl-4">
                        <div class="flex items-center gap-3 text-xs font-mono text-stone-500 uppercase tracking-wider">
                            <span class="text-black font-bold border-b border-black/20 pb-0.5">{{ $artigoPrincipal->categoria ?: 'Blog' }}</span>
                            <span>&bull;</span>
                            <span>{{ $artigoPrincipal->created_at->format('d/m/Y') }}</span>
                        </div>
                        <h3 class="text-3xl md:text-4xl font-serif text-stone-900 leading-tight group-hover:text-stone-600 transition-colors">
                            {{ $artigoPrincipal->titulo }}
                        </h3>
                        <p class="text-stone-600 font-light leading-relaxed text-sm md:text-base line-clamp-3">
                            {{ $artigoPrincipal->resumo ?: \Illuminate\Support\Str::limit(strip_tags($artigoPrincipal->conteudo), 220) }}
                        </p>
                        <a href="{{ route('blog.show', $artigoPrincipal) }}" class="pt-2 font-mono text-xs uppercase tracking-widest text-black hover:text-stone-500">Ler artigo</a>
                    </div>
                </article>

                @if ($artigosLista->isNotEmpty())
                    <hr class="border-stone-200">

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-x-8 gap-y-12">
                        @foreach ($artigosLista as $artigo)
                            <a href="{{ route('blog.show', $artigo) }}" class="flex flex-col group">
                                <div class="overflow-hidden mb-5 rounded-sm bg-stone-200">
                                    @if ($artigo->imagem_capa)
                                        <img src="{{ route('media.artigos.cover', $artigo) }}" class="w-full aspect-[4/3] object-cover transition-transform duration-500 group-hover:scale-105" alt="{{ $artigo->titulo }}">
                                    @else
                                        <div class="flex aspect-[4/3] items-center justify-center text-xs uppercase tracking-widest text-stone-400">Sem capa</div>
                                    @endif
                                </div>
                                <div class="flex flex-col gap-2">
                                    <span class="text-[10px] font-mono uppercase tracking-widest text-stone-500">{{ $artigo->categoria ?: 'Blog' }} &bull; {{ $artigo->tempo_leitura ?: 'Leitura' }}</span>
                                    <h4 class="text-xl font-serif text-stone-900 leading-snug group-hover:underline decoration-stone-300 underline-offset-4">{{ $artigo->titulo }}</h4>
                                    <p class="text-sm text-stone-600 line-clamp-2 leading-relaxed">
                                        {{ $artigo->resumo ?: \Illuminate\Support\Str::limit(strip_tags($artigo->conteudo), 140) }}
                                    </p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                @endif
                <div class="text-center">
                    <a href="{{ route('blog.index') }}" class="inline-flex border border-stone-300 px-8 py-3 font-bold uppercase tracking-widest text-xs transition-colors hover:bg-black hover:text-white hover:border-black">Ver todos os posts</a>
                </div>
            @else
                <div class="border border-dashed border-stone-300 p-12 text-center">
                    <h3 class="font-serif text-3xl text-stone-900">Nenhum artigo publicado ainda</h3>
                    <p class="mt-3 text-sm text-stone-500">Os textos cadastrados no painel administrativo vão aparecer aqui.</p>
                </div>
            @endif
        </div>
    </section>
    <footer class="bg-black text-white py-20 px-8 md:px-20 border-t border-white/10">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end">
            <div>
                <h1 class="text-4xl md:text-6xl font-serif">{!! nl2br(e($cfg('footer_title', "Vamos Colecionar\nMemórias Juntos"))) !!}</h1>
                <a href="{{ $cfg('footer_cta_url', 'https://i.pinimg.com/originals/fa/61/92/fa6192ef1935fde727ae094ce6ec71bc.gif') }}" target="_blank" class="inline-block mt-8 text-sm uppercase tracking-[0.2em] border-b border-white pb-1 hover:text-neutral-400 hover:border-neutral-400 transition-all">
                    {{ $cfg('footer_cta_text', 'Clique aqui') }}
                </a>
            </div>
            
            <div class="mt-12 md:mt-0 text-right">
                <div class="flex gap-4 justify-end mb-4 text-xs font-mono text-neutral-500">
                    <a href="{{ $cfg('instagram_url', '#') }}" target="_blank" class="hover:text-white">INSTAGRAM</a>
                    <a href="{{ $cfg('behance_url', '#') }}" target="_blank" class="hover:text-white">BEHANCE</a>
                    <a href="{{ $cfg('email_url', '#') }}" target="_blank" class="hover:text-white">EMAIL</a>
                    <a href="{{route('login')}}"  class="hover:text-white"><i class="fa-solid fa-lock"></i></a>
                </div>
                <p class="text-[10px] text-neutral-600 tracking-widest uppercase">
                    © 2025 Todos os direitos reservados.<br>feito por Nick França.
                </p>
            </div>
        </div>
    </footer>

</div>

<style>
    @keyframes fade-in-up {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in-up {
        animation: fade-in-up 1s ease-out forwards;
        opacity: 0; /* Começa invisível */
    }
    .delay-100 { animation-delay: 0.2s; }
    .delay-200 { animation-delay: 0.4s; }

    .font-serif { font-family: 'Playfair Display', serif; }
    .font-sans { font-family: 'Inter', sans-serif; }
</style>

@endsection
