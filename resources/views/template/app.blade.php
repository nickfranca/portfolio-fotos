<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Portfólio Editorial') }}</title>

        {{-- 1. Importação de Fontes Otimizada (Cinzel, Inter, Playfair) --}}
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&family=Inter:wght@300;400;500&family=Playfair+Display:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">

        {{-- 2. Tailwind CSS via CDN --}}
        {{-- IMPORTANTE: Isso garante que o design funcione instantaneamente. --}}
        {{-- Em produção, o ideal é usar o @vite, mas para visualizar agora, isso é perfeito. --}}
        <script src="https://cdn.tailwindcss.com"></script>
        
        {{-- Configuração do Tailwind para as Fontes e Cores --}}
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        fontFamily: {
                            sans: ['Inter', 'sans-serif'],
                            serif: ['Playfair Display', 'serif'],
                            display: ['Cinzel', 'serif'],
                        },
                        colors: {
                            'editorial-black': '#0b0b0b',
                            'editorial-white': '#f2f2f2',
                        }
                    }
                }
            }
        </script>

        {{-- 3. Estilos Globais e Animações --}}
        <style>
            body {
                font-family: 'Inter', sans-serif;
                background-color: #f5f5f5; /* Começa neutro, o conteúdo define o resto */
                color: #0b0b0b;
                overflow-x: hidden; /* Evita rolagem horizontal indesejada */
            }

            /* Barras de rolagem personalizadas (Estilo Minimalista) */
            ::-webkit-scrollbar {
                width: 8px;
            }
            ::-webkit-scrollbar-track {
                background: #f1f1f1;
            }
            ::-webkit-scrollbar-thumb {
                background: #888;
                border-radius: 4px;
            }
            ::-webkit-scrollbar-thumb:hover {
                background: #555;
            }

            /* Utilitários de Animação Globais */
            .delay-100 { animation-delay: 0.1s; }
            .delay-200 { animation-delay: 0.2s; }
            .delay-300 { animation-delay: 0.3s; }
        </style>

        {{-- Mantendo seu suporte ao Vite caso queira usar depois --}}
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
    </head>
    <body class="antialiased">
        @yield('content')
    </body>
</html>