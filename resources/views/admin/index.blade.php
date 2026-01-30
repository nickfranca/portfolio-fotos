@extends('template.app')

@section('content')

<div class="min-h-screen bg-white flex font-sans text-neutral-900">

    <aside class="w-64 border-r border-neutral-100 hidden md:flex flex-col fixed h-full bg-white z-20">
        <div class="p-8">
            <h1 class="font-serif text-2xl italic">N.Portfolio</h1>
            <p class="text-[10px] font-mono text-neutral-400 mt-1 tracking-widest uppercase">Admin Panel</p>
        </div>

        <nav class="flex-1 px-4 space-y-2">
            <a href="#" class="flex items-center gap-4 px-4 py-3 bg-neutral-50 text-black group">
                <span class="w-1 h-1 bg-black rounded-full"></span>
                <span class="font-mono text-xs uppercase tracking-widest">Nova Obra</span>
            </a>
            <a href="#" class="flex items-center gap-4 px-4 py-3 text-neutral-400 hover:text-black hover:bg-neutral-50 transition-colors group">
                <span class="w-1 h-1 bg-transparent group-hover:bg-neutral-300 rounded-full transition-colors"></span>
                <span class="font-mono text-xs uppercase tracking-widest">Catálogo</span>
            </a>
            <a href="#" class="flex items-center gap-4 px-4 py-3 text-neutral-400 hover:text-black hover:bg-neutral-50 transition-colors group">
                <span class="w-1 h-1 bg-transparent group-hover:bg-neutral-300 rounded-full transition-colors"></span>
                <span class="font-mono text-xs uppercase tracking-widest">Configurações</span>
            </a>
        </nav>

        <div class="p-8 border-t border-neutral-100">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="text-xs font-mono text-neutral-400 hover:text-red-600 uppercase tracking-widest transition-colors">
                    Sair / Logout
                </button>
            </form>
        </div>
    </aside>

    <main class="md:ml-64 flex-1 p-8 md:p-16 lg:p-24 relative">
        
        <header class="mb-16 flex justify-between items-end">
            <div>
                <span class="text-xs font-mono text-neutral-400 uppercase tracking-[0.2em] mb-2 block">Curadoria</span>
                <h2 class="text-4xl md:text-5xl font-serif text-black">Adicionar ao Catálogo</h2>
            </div>
            <button form="uploadForm" type="submit" class="hidden md:block bg-black text-white px-8 py-3 font-mono text-xs uppercase tracking-widest hover:bg-neutral-800 transition-colors">
                Publicar Obra
            </button>
        </header>

        <form id="uploadForm" action="#" method="POST" enctype="multipart/form-data" class="max-w-4xl grid grid-cols-1 lg:grid-cols-12 gap-12">
            @csrf

            <div class="lg:col-span-7 space-y-6">
                
                <div class="group relative aspect-[3/4] bg-neutral-50 border border-dashed border-neutral-300 flex flex-col justify-center items-center text-center hover:border-black transition-colors cursor-pointer overflow-hidden">
                    
                    <input type="file" name="image" id="image" class="absolute inset-0 opacity-0 cursor-pointer z-20" onchange="previewImage(event)">
                    
                    <div id="placeholder" class="pointer-events-none transition-opacity duration-300">
                        <span class="block font-serif text-4xl text-neutral-300 italic mb-2 group-hover:text-neutral-400">+</span>
                        <p class="font-mono text-xs uppercase tracking-widest text-neutral-400 group-hover:text-black">
                            Arraste ou Clique
                        </p>
                    </div>

                    <img id="preview" src="" class="absolute inset-0 w-full h-full object-cover hidden z-10 p-2 bg-white">
                </div>

                <p class="text-[10px] font-mono text-neutral-400 uppercase tracking-wider text-center">
                    Recomendado: 2000px altura (JPG/PNG)
                </p>
            </div>

            <div class="lg:col-span-5 flex flex-col gap-10">

                <div class="group">
                    <label for="titulo" class="block text-[10px] font-mono text-neutral-400 uppercase tracking-widest mb-2">Título da Obra</label>
                    <input 
                        type="text" 
                        name="titulo" 
                        id="titulo" 
                        placeholder="Ex: Silence in White" 
                        class="w-full border-b border-neutral-200 py-2 font-serif text-2xl placeholder-neutral-200 focus:outline-none focus:border-black transition-colors bg-transparent"
                    >
                </div>

                <div class="group">
                    <label for="descricao" class="block text-[10px] font-mono text-neutral-400 uppercase tracking-widest mb-2">Descrição / Contexto</label>
                    <textarea 
                        name="descricao" 
                        id="descricao" 
                        rows="4"
                        placeholder="Escreva sobre a composição, luz ou o momento..."
                        class="w-full border-b border-neutral-200 py-2 font-sans text-sm leading-relaxed text-neutral-600 placeholder-neutral-200 focus:outline-none focus:border-black transition-colors bg-transparent resize-none"
                    ></textarea>
                </div>

                <div class="pt-8 border-t border-neutral-100">
                    <span class="block text-[10px] font-mono text-neutral-400 uppercase tracking-widest mb-6">Paleta da Apresentação</span>
                    
                    <div class="flex items-center gap-8">
                        <div class="flex flex-col gap-2">
                            <label for="bg_color" class="text-xs font-sans text-neutral-500">Fundo</label>
                            <div class="relative w-10 h-10 rounded-full overflow-hidden border border-neutral-200 shadow-sm hover:scale-105 transition-transform">
                                <input type="color" name="bg_color" id="bg_color" value="#ffffff" class="absolute -top-2 -left-2 w-16 h-16 p-0 cursor-pointer">
                            </div>
                        </div>

                        <div class="flex flex-col gap-2">
                            <label for="text_color" class="text-xs font-sans text-neutral-500">Tipografia</label>
                            <div class="relative w-10 h-10 rounded-full overflow-hidden border border-neutral-200 shadow-sm hover:scale-105 transition-transform">
                                <input type="color" name="text_color" id="text_color" value="#000000" class="absolute -top-2 -left-2 w-16 h-16 p-0 cursor-pointer">
                            </div>
                        </div>
                    </div>
                </div>
                
                <button type="submit" class="md:hidden w-full mt-8 bg-black text-white py-4 font-mono text-xs uppercase tracking-widest">
                    Publicar
                </button>

            </div>
        </form>
    </main>
</div>

<script>
    function previewImage(event) {
        const reader = new FileReader();
        const imageField = document.getElementById("image");
        const preview = document.getElementById("preview");
        const placeholder = document.getElementById("placeholder");

        reader.onload = function() {
            if (reader.readyState == 2) {
                preview.src = reader.result;
                preview.classList.remove("hidden");
                placeholder.classList.add("opacity-0");
            }
        }
        
        if(event.target.files[0]) {
            reader.readAsDataURL(event.target.files[0]);
        }
    }
</script>

@endsection