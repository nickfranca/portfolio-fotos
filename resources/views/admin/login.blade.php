@extends('template.app')

@section('content')

<div class="h-screen w-full flex overflow-hidden bg-white selection:bg-black selection:text-white font-sans">

    <div class="hidden md:block w-1/2 h-full relative group">
        <div class="absolute inset-0 bg-black/10 z-10"></div>
        <img 
            src="https://images.unsplash.com/photo-1493863641943-9b68992a8d07?q=80&w=2058&auto=format&fit=crop" 
            alt="Admin Login Texture" 
            class="w-full h-full object-cover grayscale brightness-90 contrast-125 group-hover:scale-105 transition-transform duration-[2s] ease-out"
        >
        
        <div class="absolute top-10 left-10 z-20 text-white mix-blend-difference">
            <span class="text-xs font-mono uppercase tracking-[0.3em]">Restricted Area</span>
        </div>

        <div class="absolute bottom-10 right-10 z-20 text-white text-right">
             <p class="font-serif italic text-2xl opacity-80">"Control the narrative."</p>
        </div>
    </div>

    <div class="w-full md:w-1/2 h-full flex flex-col relative bg-white">
        
<div class="absolute top-8 left-8 md:top-12 md:left-12 z-50">
    <a href="{{url('/')}}" class="text-xs font-mono uppercase tracking-widest text-neutral-400 hover:text-black transition-colors flex items-center gap-2 group cursor-pointer">
        <span class="transform group-hover:-translate-x-1 transition-transform">&larr;</span> Voltar ao Site
    </a>
</div>
        <div class="flex-1 flex flex-col justify-center px-8 md:px-24 lg:px-32 animate-fade-in-up">
            
            <div class="mb-12">
                <span class="text-xs font-bold text-neutral-400 uppercase tracking-[0.2em] mb-2 block">Bem-vindo de volta</span>
                <h1 class="text-5xl font-serif text-black mb-2">Administrativo</h1>
                <div class="w-12 h-0.5 bg-black"></div>
            </div>

            <form action="{{ route('login.post') }}" method="POST" class="flex flex-col gap-10">
                 @csrf 

                <div class="group relative">
                    <input 
                        type="login" 
                        name="login" 
                        id="login" 
                        required 
                        class="peer w-full bg-transparent border-b border-neutral-300 py-3 text-neutral-900 focus:outline-none focus:border-black transition-colors placeholder-transparent font-serif"
                        placeholder="Login"
                    >
                    <label 
                        for="login" 
                        class="absolute left-0 -top-3 text-xs text-neutral-400 font-mono uppercase tracking-widest transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:text-neutral-400 peer-placeholder-shown:top-3 peer-focus:-top-3 peer-focus:text-xs peer-focus:text-black"
                    >
                        Login
                    </label>
                </div>

                <div class="group relative">
                    <input 
                        type="password" 
                        name="password" 
                        id="password" 
                        required 
                        class="peer w-full bg-transparent border-b border-neutral-300 py-3 text-neutral-900 focus:outline-none focus:border-black transition-colors placeholder-transparent font-serif"
                        placeholder="Senha"
                    >
                    <label 
                        for="password" 
                        class="absolute left-0 -top-3 text-xs text-neutral-400 font-mono uppercase tracking-widest transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:text-neutral-400 peer-placeholder-shown:top-3 peer-focus:-top-3 peer-focus:text-xs peer-focus:text-black"
                    >
                        Sua Senha
                    </label>
                </div>

                <button type="submit" class="mt-8 group relative py-4 bg-black text-white overflow-hidden">
                    <div class="absolute inset-0 w-full h-full bg-neutral-800 translate-y-full group-hover:translate-y-0 transition-transform duration-500 ease-out"></div>
                    <span class="relative z-8 font-mono text-xs uppercase tracking-[0.5em] font-bold group-hover:tracking-[0.4em] transition-all">
                        Acessar 
                    </span>
                </button>

                {{-- <div class="flex justify-between items-center mt-4 text-[10px] uppercase tracking-wider text-neutral-500 font-mono">
                    <label class="flex items-center gap-2 cursor-pointer hover:text-black transition-colors">
                        <input type="checkbox" name="remember" class="accent-black">
                        Lembrar de mim
                    </label>
                    <a href="#" class="hover:text-black hover:underline transition-colors">Esqueceu a senha?</a>
                </div> --}}

            </form>
        </div>

        <div class="absolute bottom-8 w-full text-center md:text-left md:px-12">
            <p class="text-[10px] text-neutral-300 font-mono uppercase tracking-widest">
                Nick Portfolio &copy; 2025
            </p>
        </div>

    </div>
</div>

<style>
    /* Reaproveitando a animação suave que você já tinha */
    @keyframes fade-in-up {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in-up {
        animation: fade-in-up 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        opacity: 0;
    }
    
    .font-serif { font-family: 'Playfair Display', serif; }
    .font-sans { font-family: 'Inter', sans-serif; }
</style>

@endsection