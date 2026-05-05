@extends('template.app')

@section('content')

@php
    $configuracoes = $configuracoes ?? [];
    $cfg = fn (string $key, string $default = '') => old($key, $configuracoes[$key] ?? $default);

    $adminSections = [
        ['id' => 'projetos', 'number' => '01', 'title' => 'Projetos', 'meta' => $projetos->count() . ' projetos'],
        ['id' => 'portfolio', 'number' => '02', 'title' => 'Fotos', 'meta' => $fotos->count() . ' publicadas'],
        ['id' => 'blog', 'number' => '03', 'title' => 'Blog', 'meta' => $artigos->count() . ' artigos'],
        ['id' => 'configuracoes', 'number' => '04', 'title' => 'Site', 'meta' => 'Textos e marca'],
        ['id' => 'usuarios', 'number' => '05', 'title' => 'Usuários', 'meta' => $usuarios->count() . ' usuários'],
    ];
@endphp

@include('admin.partials.styles')

<div class="admin-shell min-h-screen font-sans text-neutral-900">
    @include('admin.partials.sidebar', ['sections' => $adminSections])

    <main class="md:ml-72 px-5 py-8 md:p-10 lg:p-12">
        @include('admin.partials.header')
        @include('admin.partials.dashboard', ['sections' => $adminSections])
        @include('admin.partials.alerts')

        @include('admin.partials.sections.projects')
        @include('admin.partials.sections.photos')
        @include('admin.partials.sections.blog')
        @include('admin.partials.sections.site')
        @include('admin.partials.sections.users')
    </main>
</div>

@include('admin.partials.scripts')

@endsection
