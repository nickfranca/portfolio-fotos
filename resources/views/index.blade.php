@extends('template.app')

@section('content')


<div class="bg-neutral-100 text-neutral-900 font-sans selection:bg-black selection:text-white overflow-x-hidden">

    <section class="h-screen flex flex-col relative group">
        <div class="h-[45vh] bg-black text-white flex flex-col justify-center px-8 md:px-20 relative z-10">
            <span class="text-xs tracking-[0.3em] uppercase opacity-60 mb-4 animate-fade-in-up">Portfolio 2025</span>
            <h1 class="text-6xl md:text-8xl font-serif font-medium leading-none tracking-tight animate-fade-in-up delay-100">
                Photography<br>
                <i class="font-light opacity-80">Portfolio</i>
            </h1>
            <p class="mt-6 text-sm tracking-widest uppercase border-t border-white/20 pt-4 w-32 animate-fade-in-up delay-200">
                By Nick
            </p>

            <div class="absolute right-8 top-8 md:right-20 md:top-20 border border-white/20 p-2 w-24 h-24 flex items-center justify-center rounded-full hover:rotate-90 transition-transform duration-700 cursor-pointer">
                <span class="text-[0.6rem] text-center uppercase tracking-widest leading-relaxed">
                    Est.<br>2025<br>Edition
                </span>
            </div>
        </div>
        <div class="flex-1 bg-neutral-200 relative overflow-hidden">
             <img 
                src="https://images.unsplash.com/photo-1470338229081-eb5980be28c9?fm=jpg&q=60&w=3000&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1yZWxhdGVkfDE1fHx8ZW58MHx8fHx8" 
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
            <h2 class="text-4xl font-serif text-black">Nossos Trabalhos</h2>
            <span class="text-xs font-mono uppercase tracking-widest hidden md:block">Index / 02 - 16</span>
        </div>
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
                    <p class="font-serif italic text-lg">"A fotografia é a história que não consigo expressar em palavras."</p>
                    <span class="text-[10px] uppercase mt-4 tracking-widest">— Destin Sparks</span>
                </div>
            </div>

        </div>
    </section>

    <section class="min-h-screen flex flex-col md:flex-row">

        <div class="w-full md:w-1/2 bg-black text-white p-12 md:p-24 flex flex-col justify-between relative overflow-hidden">
            <div class="absolute top-24 left-4 md:left-10 origin-bottom-left -rotate-90 translate-y-full hidden md:block">
                <span class="text-xs uppercase tracking-[0.4em] text-neutral-500">Introdução</span>
            </div>

            <div class="md:pl-12 z-10">
                <h2 class="text-4xl md:text-5xl font-serif mb-8 leading-tight">
                    Capturando<br>
                    <span class="italic text-neutral-400">Momentos</span>
                </h2>
                <div class="w-12 h-0.5 bg-white/20 mb-8"></div>
                <p class="text-neutral-400 font-light text-sm leading-relaxed max-w-sm text-justify">
                    A fotografia não é sobre câmeras e lentes. É sobre a essência, a luz e a sombra que dançam juntas em um momento efêmero. Este portfólio é uma curadoria de instantes congelados no tempo.
                </p>
            </div>

            <div class="mt-16 md:mt-0 md:pl-12 border-l border-white/10 pl-6 space-y-2 text-sm text-neutral-500 font-mono">
                <p>01. Editorial ............ P.04</p>
                <p>02. Landscape ............ P.08</p>
                <p>03. Portraits ............ P.12</p>
            </div>
        </div>
        <div class="w-full md:w-1/2 bg-neutral-100 p-8 md:p-12 flex items-center justify-center relative">
            <div class="w-full h-[80%] bg-white shadow-2xl overflow-hidden relative group">
                <img 
                    src="https://conafer.org.br/wp-content/uploads/2024/10/image2-4.png" 
                    alt="Intro Portrait"
                    class="w-full h-full object-cover filter grayscale contrast-125 group-hover:grayscale-0 transition-all duration-700"
                >
                <div class="absolute bottom-0 left-0 bg-white p-4 max-w-xs transform translate-y-full group-hover:translate-y-0 transition-transform duration-500 border-t border-black">
                    <p class="font-serif text-lg italic">The Gaze</p>
                    <p class="text-[10px] uppercase tracking-widest mt-1">Studio Session • 2024</p>
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
        
        <article class="group grid grid-cols-1 md:grid-cols-12 gap-8 items-center cursor-pointer">
            <div class="md:col-span-7 relative overflow-hidden rounded-sm">
                <img 
                    src="https://burst.shopifycdn.com/photos/beach-sunset-thailand.jpg?width=1000&format=pjpg&exif=0&iptc=0" 
                    class="w-full aspect-[16/9] object-cover transition-transform duration-700 group-hover:scale-105"
                    alt="Pôr do sol na Tailândia"
                >
            </div>
            
            <div class="md:col-span-5 flex flex-col gap-4 md:pl-4">
                <div class="flex items-center gap-3 text-xs font-mono text-stone-500 uppercase tracking-wider">
                    <span class="text-black font-bold border-b border-black/20 pb-0.5">Viagem</span>
                    <span>&bull;</span>
                    <span>22 Jan 2026</span>
                </div>
                
                <h3 class="text-3xl md:text-4xl font-serif text-stone-900 leading-tight group-hover:text-stone-600 transition-colors">
                    O silêncio dourado das praias ao entardecer
                </h3>
                
                <p class="text-stone-600 font-light leading-relaxed text-sm md:text-base line-clamp-3">
                    Aqui é onde o cliente escreve sobre o ambiente. A luz estava perfeita e não havia ninguém por perto. É impressionante como a natureza muda de cor em questão de minutos...
                </p>
                
                <div class="pt-4">
                    <span class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-widest border-b-2 border-transparent group-hover:border-black transition-all pb-1">
                        Ler Artigo <span class="text-lg leading-none">&rarr;</span>
                    </span>
                </div>
            </div>
        </article>

        <hr class="border-stone-200">

        <div class="grid grid-cols-1 md:grid-cols-3 gap-x-8 gap-y-12">
            
            <article class="flex flex-col group cursor-pointer">
                <div class="overflow-hidden mb-5 rounded-sm">
                    <img 
                        src="https://images.unsplash.com/photo-1630770175431-97430a3bd6e3?fm=jpg&q=60&w=3000&auto=format&fit=crop" 
                        class="w-full aspect-[4/3] object-cover transition-transform duration-500 group-hover:scale-105"
                    >
                </div>
                <div class="flex flex-col gap-2">
                    <span class="text-[10px] font-mono uppercase tracking-widest text-stone-500">Natureza &bull; 5 min</span>
                    <h4 class="text-xl font-serif text-stone-900 leading-snug group-hover:underline decoration-stone-300 underline-offset-4">Águas Cristalinas</h4>
                    <p class="text-sm text-stone-600 line-clamp-2 leading-relaxed">
                        Um comentário rápido sobre a temperatura da água e a sensação de mergulhar neste paraíso escondido.
                    </p>
                </div>
            </article>

            <article class="flex flex-col group cursor-pointer">
                <div class="overflow-hidden mb-5 rounded-sm">
                    <img 
                        src="https://cdn.pixabay.com/photo/2017/01/12/08/15/animal-1974025_1280.jpg" 
                        class="w-full aspect-[4/3] object-cover transition-transform duration-500 group-hover:scale-105"
                    >
                </div>
                <div class="flex flex-col gap-2">
                    <span class="text-[10px] font-mono uppercase tracking-widest text-stone-500">Fauna &bull; 3 min</span>
                    <h4 class="text-xl font-serif text-stone-900 leading-snug group-hover:underline decoration-stone-300 underline-offset-4">Encontros Selvagens</h4>
                    <p class="text-sm text-stone-600 line-clamp-2 leading-relaxed">
                         A sorte de encontrar este animal em seu habitat natural foi indescritível, um momento único.
                    </p>
                </div>
            </article>

            <article class="flex flex-col group cursor-pointer">
                <div class="overflow-hidden mb-5 rounded-sm">
                    <img 
                        src="https://ciclovivo.com.br/wp-content/uploads/2015/009/img/noticias/7475598318_b2084ba4ba_z.jpg" 
                        class="w-full aspect-[4/3] object-cover transition-transform duration-500 group-hover:scale-105"
                    >
                </div>
                <div class="flex flex-col gap-2">
                    <span class="text-[10px] font-mono uppercase tracking-widest text-stone-500">Urbano &bull; 7 min</span>
                    <h4 class="text-xl font-serif text-stone-900 leading-snug group-hover:underline decoration-stone-300 underline-offset-4">Caminhos de Bike</h4>
                    <p class="text-sm text-stone-600 line-clamp-2 leading-relaxed">
                         Um passeio pela ciclovia no fim da tarde revelou ângulos completamente novos da cidade.
                    </p>
                </div>
            </article>

        </div>
        
        <div class="text-center mt-8">
            <button class="px-8 py-3 border border-stone-300 hover:bg-black hover:text-white hover:border-black transition-colors uppercase text-xs tracking-widest font-bold">
                Carregar Mais Posts
            </button>
        </div>

    </div>
</section>
    <footer class="bg-black text-white py-20 px-8 md:px-20 border-t border-white/10">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end">
            <div>
                <h1 class="text-4xl md:text-6xl font-serif">Vamos Colecionar<br>Memórias Juntos</h1>
                <a href="https://i.pinimg.com/originals/fa/61/92/fa6192ef1935fde727ae094ce6ec71bc.gif" target="_blank" class="inline-block mt-8 text-sm uppercase tracking-[0.2em] border-b border-white pb-1 hover:text-neutral-400 hover:border-neutral-400 transition-all">
                    Clique aqui
                </a>
            </div>
            
            <div class="mt-12 md:mt-0 text-right">
                <div class="flex gap-4 justify-end mb-4 text-xs font-mono text-neutral-500">
                    <a href="https://i.pinimg.com/originals/fa/61/92/fa6192ef1935fde727ae094ce6ec71bc.gif" target="_blank" class="hover:text-white">INSTAGRAM</a>
                    <a href="https://i.pinimg.com/originals/fa/61/92/fa6192ef1935fde727ae094ce6ec71bc.gif" target="_blank" class="hover:text-white">BEHANCE</a>
                    <a href="https://i.pinimg.com/originals/fa/61/92/fa6192ef1935fde727ae094ce6ec71bc.gif" target="_blank" class="hover:text-white">EMAIL</a>
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