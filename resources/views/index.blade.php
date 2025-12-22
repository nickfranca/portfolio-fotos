@extends('template.app')

@section('content')

{{-- Importando Fontes Estilo Editorial --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&family=Inter:wght@300;400;500&family=Playfair+Display:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">

<div class="bg-neutral-100 text-neutral-900 font-sans selection:bg-black selection:text-white overflow-x-hidden">

    {{-- CAPA (Inspirado no primeiro quadro da imagem) --}}
    {{-- Layout dividido Horizontalmente: Preto em cima, Imagem em baixo --}}
    <section class="h-screen flex flex-col relative group">
        
        {{-- Parte Superior: Identidade --}}
        <div class="h-[45vh] bg-black text-white flex flex-col justify-center px-8 md:px-20 relative z-10">
            <span class="text-xs tracking-[0.3em] uppercase opacity-60 mb-4 animate-fade-in-up">Portfolio 2025</span>
            <h1 class="text-6xl md:text-8xl font-serif font-medium leading-none tracking-tight animate-fade-in-up delay-100">
                Photography<br>
                <i class="font-light opacity-80">Portfolio</i>
            </h1>
            <p class="mt-6 text-sm tracking-widest uppercase border-t border-white/20 pt-4 w-32 animate-fade-in-up delay-200">
                By Your Name
            </p>
            
            {{-- Elemento Decorativo (Barcode/Badge da referência) --}}
            <div class="absolute right-8 top-8 md:right-20 md:top-20 border border-white/20 p-2 w-24 h-24 flex items-center justify-center rounded-full hover:rotate-90 transition-transform duration-700 cursor-pointer">
                <span class="text-[0.6rem] text-center uppercase tracking-widest leading-relaxed">
                    Est.<br>2025<br>Edition
                </span>
            </div>
        </div>

        {{-- Parte Inferior: Imagem Texturizada --}}
        <div class="flex-1 bg-neutral-200 relative overflow-hidden">
             <img 
                src="https://images.unsplash.com/photo-1490750967868-58cb75063ed6?q=80&w=2000&auto=format&fit=crop" 
                alt="Capa Textura"
                class="w-full h-full object-cover grayscale opacity-80 group-hover:scale-105 group-hover:grayscale-0 transition-all duration-1000 ease-out"
            >
            {{-- Botão de Scroll --}}
            <div class="absolute bottom-10 left-1/2 -translate-x-1/2 animate-bounce">
                <svg class="w-6 h-6 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path></svg>
            </div>
        </div>
    </section>

    {{-- SPREAD 1: INTRODUÇÃO (Inspirado no quadro preto com texto vertical) --}}
    {{-- Layout "Revista Aberta": Esquerda Preta, Direita Branca --}}
    <section class="min-h-screen flex flex-col md:flex-row">
        
        {{-- Página Esquerda (Preta) --}}
        <div class="w-full md:w-1/2 bg-black text-white p-12 md:p-24 flex flex-col justify-between relative overflow-hidden">
            {{-- Texto Vertical --}}
            <div class="absolute top-24 left-4 md:left-10 origin-bottom-left -rotate-90 translate-y-full hidden md:block">
                <span class="text-xs uppercase tracking-[0.5em] text-neutral-500">Introduction</span>
            </div>

            <div class="md:pl-12 z-10">
                <h2 class="text-4xl md:text-5xl font-serif mb-8 leading-tight">
                    Capturing the<br>
                    <span class="italic text-neutral-400">Silent Moments</span>
                </h2>
                <div class="w-12 h-0.5 bg-white/20 mb-8"></div>
                <p class="text-neutral-400 font-light text-sm leading-relaxed max-w-sm text-justify">
                    A fotografia não é sobre câmeras e lentes. É sobre a essência, a luz e a sombra que dançam juntas em um momento efêmero. Este portfólio é uma curadoria de instantes congelados no tempo.
                </p>
            </div>

            {{-- Elemento visual "Lista de Conteúdo" da referência --}}
            <div class="mt-16 md:mt-0 md:pl-12 border-l border-white/10 pl-6 space-y-2 text-sm text-neutral-500 font-mono">
                <p>01. Editorial ............ P.04</p>
                <p>02. Landscape ............ P.08</p>
                <p>03. Portraits ............ P.12</p>
            </div>
        </div>

        {{-- Página Direita (Imagem Clean) --}}
        <div class="w-full md:w-1/2 bg-neutral-100 p-8 md:p-12 flex items-center justify-center relative">
            <div class="w-full h-[80%] bg-white shadow-2xl overflow-hidden relative group">
                <img 
                    src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?q=80&w=1000&auto=format&fit=crop" 
                    alt="Intro Portrait"
                    class="w-full h-full object-cover filter grayscale contrast-125 group-hover:grayscale-0 transition-all duration-700"
                >
                {{-- Legenda Flutuante --}}
                <div class="absolute bottom-0 left-0 bg-white p-4 max-w-xs transform translate-y-full group-hover:translate-y-0 transition-transform duration-500 border-t border-black">
                    <p class="font-serif text-lg italic">The Gaze</p>
                    <p class="text-[10px] uppercase tracking-widest mt-1">Studio Session • 2024</p>
                </div>
            </div>
        </div>
    </section>

    {{-- SPREAD 2: GRID DE PROJETOS (Inspirado nos quadros com 4 e 6 fotos) --}}
    <section class="min-h-screen py-20 px-6 md:px-20 bg-white">
        
        <div class="flex justify-between items-end mb-16 border-b border-black/10 pb-6">
            <h2 class="text-4xl font-serif text-black">Selected Works</h2>
            <span class="text-xs font-mono uppercase tracking-widest hidden md:block">Index / 02 - 16</span>
        </div>

        {{-- O Grid da Referência (Assimétrico e Elegante) --}}
        <div class="grid grid-cols-1 md:grid-cols-12 gap-4 md:gap-8 auto-rows-[300px]">
            
            {{-- Item Grande (Texto + Imagem) --}}
            <div class="col-span-1 md:col-span-6 row-span-2 bg-neutral-50 p-8 flex flex-col justify-between group hover:bg-neutral-100 transition-colors">
                <div>
                    <span class="text-xs font-bold uppercase tracking-widest border-b border-black pb-1">Project 01</span>
                    <h3 class="text-3xl font-serif mt-4 mb-2">Urban Shadows</h3>
                    <p class="text-sm text-neutral-500 max-w-xs">Exploração geométrica das cidades modernas e a solidão em meio à multidão.</p>
                </div>
                <div class="h-64 overflow-hidden mt-6 relative">
                    <img src="https://images.unsplash.com/photo-1449824913935-59a10b8d2000?q=80&w=800&auto=format&fit=crop" class="w-full h-full object-cover grayscale group-hover:scale-105 transition-transform duration-700">
                </div>
            </div>

            {{-- Grid Pequeno (4 Quadrados da referência) --}}
            <div class="col-span-1 md:col-span-6 row-span-2 grid grid-cols-2 gap-4">
                
                <div class="bg-gray-200 overflow-hidden relative group">
                    <img src="https://images.unsplash.com/photo-1500917293891-ef795e70e1f6?q=80&w=600&auto=format&fit=crop" class="w-full h-full object-cover hover:opacity-80 transition-opacity duration-300">
                    <span class="absolute top-2 left-2 text-[10px] bg-white px-2 py-1 opacity-0 group-hover:opacity-100 transition-opacity">01</span>
                </div>
                
                <div class="bg-gray-200 overflow-hidden relative group">
                    <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?q=80&w=600&auto=format&fit=crop" class="w-full h-full object-cover hover:opacity-80 transition-opacity duration-300">
                     <span class="absolute top-2 left-2 text-[10px] bg-white px-2 py-1 opacity-0 group-hover:opacity-100 transition-opacity">02</span>
                </div>
                
                <div class="bg-gray-200 overflow-hidden relative group">
                    <img src="https://images.unsplash.com/photo-1453728013993-6d66e9c9123a?q=80&w=600&auto=format&fit=crop" class="w-full h-full object-cover hover:opacity-80 transition-opacity duration-300">
                     <span class="absolute top-2 left-2 text-[10px] bg-white px-2 py-1 opacity-0 group-hover:opacity-100 transition-opacity">03</span>
                </div>
                
                {{-- Bloco de Texto no meio do grid (Estilo Editorial) --}}
                <div class="bg-black text-white p-6 flex flex-col justify-center items-center text-center">
                    <p class="font-serif italic text-lg">"Photography is the story I fail to put into words."</p>
                    <span class="text-[10px] uppercase mt-4 tracking-widest">— Destin Sparks</span>
                </div>
            </div>

        </div>
    </section>

    {{-- FOOTER / CONTRACAPA --}}
    <footer class="bg-black text-white py-20 px-8 md:px-20 border-t border-white/10">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end">
            <div>
                <h1 class="text-4xl md:text-6xl font-serif">Let's Create<br>Together</h1>
                <a href="#" class="inline-block mt-8 text-sm uppercase tracking-[0.2em] border-b border-white pb-1 hover:text-neutral-400 hover:border-neutral-400 transition-all">
                    Get in Touch
                </a>
            </div>
            
            <div class="mt-12 md:mt-0 text-right">
                <div class="flex gap-4 justify-end mb-4 text-xs font-mono text-neutral-500">
                    <a href="#" class="hover:text-white">INSTAGRAM</a>
                    <a href="#" class="hover:text-white">BEHANCE</a>
                    <a href="#" class="hover:text-white">EMAIL</a>
                </div>
                <p class="text-[10px] text-neutral-600 tracking-widest uppercase">
                    © 2025 All rights reserved.<br>Designed based on Print Aesthetics.
                </p>
            </div>
        </div>
    </footer>

</div>

<style>
    /* Animações Sutis para Web */
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
    
    /* Fontes Customizadas para simular a imagem */
    .font-serif { font-family: 'Playfair Display', serif; }
    .font-sans { font-family: 'Inter', sans-serif; }
</style>

@endsection