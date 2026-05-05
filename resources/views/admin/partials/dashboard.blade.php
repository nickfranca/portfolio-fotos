<div class="mb-8 grid grid-cols-1 gap-3 md:grid-cols-5">
    @foreach ($sections as $section)
        <a href="#{{ $section['id'] }}" data-dashboard-link class="admin-dashboard-card @if($loop->first) is-active @endif p-5 transition-colors">
            <span class="font-mono text-[10px] uppercase tracking-widest text-neutral-400">{{ $section['number'] }}</span>
            <strong class="mt-2 block font-serif text-xl">{{ $section['title'] }}</strong>
            <span class="mt-1 block text-xs text-neutral-500">{{ $section['meta'] }}</span>
        </a>
    @endforeach
</div>
