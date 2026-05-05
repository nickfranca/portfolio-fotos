<aside class="admin-sidebar fixed inset-y-0 left-0 z-20 hidden w-72 flex-col md:flex">
    <div class="p-8">
        <h1 class="font-serif text-2xl italic">N.Portfolio</h1>
        <p class="mt-1 text-[10px] font-mono uppercase tracking-widest text-neutral-400">Painel administrativo</p>
    </div>

    <nav class="flex-1 px-4 space-y-2" aria-label="Seções do administrativo">
        @foreach ($sections as $section)
            <a href="#{{ $section['id'] }}" data-nav-link class="admin-nav-link @if($loop->first) is-active @endif flex items-center gap-4 px-4 py-3 transition-colors">
                <span class="h-1 w-1 rounded-full bg-neutral-300"></span>
                <span class="font-mono text-xs uppercase tracking-widest">{{ $section['title'] }}</span>
            </a>
        @endforeach

        <a href="{{ url('/') }}" target="_blank" class="admin-nav-link flex items-center gap-4 px-4 py-3 transition-colors">
            <span class="h-1 w-1 rounded-full bg-neutral-300"></span>
            <span class="font-mono text-xs uppercase tracking-widest">Ver Site</span>
        </a>
    </nav>

    <div class="border-t border-white/10 p-8">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="font-mono text-xs uppercase tracking-widest text-neutral-400 transition-colors hover:text-white">
                Sair / Logout
            </button>
        </form>
    </div>
</aside>
