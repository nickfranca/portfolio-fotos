<section id="configuracoes" data-admin-section class="admin-section">
    @include('admin.partials.section-title', [
        'number' => '04',
        'eyebrow' => 'Site editável',
        'title' => 'Textos, links e marca',
        'description' => 'Controle textos fixos, links sociais, imagens de apoio, cores, sumário e marca d’água aplicada nas fotos.',
    ])

    <form action="{{ route('admin.configuracoes.update') }}" method="POST" class="grid grid-cols-1 gap-8 lg:grid-cols-12">
        @csrf
        @method('PUT')

        <div class="space-y-5 lg:col-span-6">
            <h3 class="font-serif text-2xl">Capa e portfólio</h3>
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                <input name="site_label" value="{{ $cfg('site_label', 'Portfolio 2025') }}" placeholder="Selo superior" class="admin-field">
                <input name="hero_subtitle" value="{{ $cfg('hero_subtitle', 'By Nick') }}" placeholder="Assinatura" class="admin-field">
                <input name="hero_title" value="{{ $cfg('hero_title', 'Photography') }}" placeholder="Título principal" class="admin-field font-serif text-xl">
                <input name="hero_highlight" value="{{ $cfg('hero_highlight', 'Portfolio') }}" placeholder="Título em itálico" class="admin-field font-serif text-xl">
            </div>
            <textarea name="hero_badge" rows="3" class="w-full resize-none border border-neutral-300 p-3 text-sm focus:border-black focus:outline-none">{{ $cfg('hero_badge', "Est.\n2025\nEdition") }}</textarea>

            <select name="cover_foto_id" class="w-full border border-neutral-300 px-3 py-2 text-sm focus:border-black focus:outline-none">
                <option value="">Capa: usar URL abaixo</option>
                @foreach ($fotos as $foto)
                    <option value="{{ $foto->id }}" @selected((string) $cfg('cover_foto_id', '') === (string) $foto->id)>{{ $foto->titulo ?: 'Foto #' . $foto->id }}</option>
                @endforeach
            </select>
            <input name="cover_image_url" value="{{ $cfg('cover_image_url', 'https://images.unsplash.com/photo-1470338229081-eb5980be28c9?fm=jpg&q=60&w=3000&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1yZWxhdGVkfDE1fHx8ZW58MHx8fHx8') }}" placeholder="Imagem da capa por URL" class="admin-field text-sm">

            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                <input name="works_title" value="{{ $cfg('works_title', 'Nossos Trabalhos') }}" placeholder="Título da seção" class="admin-field">
                <input name="portfolio_quote_author" value="{{ $cfg('portfolio_quote_author', 'Destin Sparks') }}" placeholder="Autor da frase" class="admin-field">
                <input name="works_index_label" value="{{ $cfg('works_index_label', 'Index') }}" placeholder="Label do index" class="admin-field">
                <input name="works_index_value" value="{{ $cfg('works_index_value', str_pad($fotos->count() ?: 4, 2, '0', STR_PAD_LEFT)) }}" placeholder="Valor do index" class="admin-field">
            </div>
            <textarea name="portfolio_quote" rows="3" class="w-full resize-none border border-neutral-300 p-3 text-sm focus:border-black focus:outline-none">{{ $cfg('portfolio_quote', 'A fotografia é a história que não consigo expressar em palavras.') }}</textarea>
        </div>

        <div class="space-y-5 lg:col-span-6">
            <h3 class="font-serif text-2xl">Introdução e rodapé</h3>
            <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
                <input name="intro_label" value="{{ $cfg('intro_label', 'Introdução') }}" placeholder="Intro label" class="admin-field">
                <input name="intro_title" value="{{ $cfg('intro_title', 'Capturando') }}" placeholder="Intro título" class="admin-field">
                <input name="intro_highlight" value="{{ $cfg('intro_highlight', 'Momentos') }}" placeholder="Intro destaque" class="admin-field">
            </div>
            <textarea name="intro_text" rows="4" class="w-full resize-y border border-neutral-300 p-3 text-sm leading-relaxed focus:border-black focus:outline-none">{{ $cfg('intro_text', 'A fotografia não é sobre câmeras e lentes. É sobre a essência, a luz e a sombra que dançam juntas em um momento efêmero. Este portfólio é uma curadoria de instantes congelados no tempo.') }}</textarea>
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                <input name="intro_hover_title" value="{{ $cfg('intro_hover_title', 'The Gaze') }}" placeholder="Selo no hover da foto" class="admin-field">
                <input name="intro_hover_subtitle" value="{{ $cfg('intro_hover_subtitle', 'Studio Session • 2024') }}" placeholder="Subtítulo do selo" class="admin-field">
            </div>
            <select name="intro_foto_id" class="w-full border border-neutral-300 px-3 py-2 text-sm focus:border-black focus:outline-none">
                <option value="">Introdução: usar URL abaixo</option>
                @foreach ($fotos as $foto)
                    <option value="{{ $foto->id }}" @selected((string) $cfg('intro_foto_id', '') === (string) $foto->id)>{{ $foto->titulo ?: 'Foto #' . $foto->id }}</option>
                @endforeach
            </select>
            <input name="intro_image_url" value="{{ $cfg('intro_image_url', 'https://conafer.org.br/wp-content/uploads/2024/10/image2-4.png') }}" placeholder="Imagem da introdução por URL" class="admin-field text-sm">

            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                <textarea name="footer_title" rows="2" class="w-full resize-none border border-neutral-300 p-3 text-sm focus:border-black focus:outline-none">{{ $cfg('footer_title', "Vamos Colecionar\nMemórias Juntos") }}</textarea>
                <input name="footer_cta_text" value="{{ $cfg('footer_cta_text', 'Clique aqui') }}" placeholder="Texto do botão" class="admin-field">
                <input name="footer_cta_url" value="{{ $cfg('footer_cta_url', 'https://i.pinimg.com/originals/fa/61/92/fa6192ef1935fde727ae094ce6ec71bc.gif') }}" placeholder="Link do botão" class="admin-field text-sm">
                <input name="email_url" value="{{ $cfg('email_url', '#') }}" placeholder="Link de email" class="admin-field text-sm">
                <input name="instagram_url" value="{{ $cfg('instagram_url', '#') }}" placeholder="Instagram" class="admin-field text-sm">
                <input name="behance_url" value="{{ $cfg('behance_url', '#') }}" placeholder="Behance" class="admin-field text-sm">
            </div>
        </div>

        <div class="border border-neutral-200 bg-neutral-100 p-5 lg:col-span-6">
            <h4 class="mb-4 font-serif text-xl">Marca d'água</h4>
            <div class="grid grid-cols-1 gap-4 md:grid-cols-4">
                <input name="watermark_text" value="{{ $cfg('watermark_text', config('app.name', 'Portfolio')) }}" placeholder="Texto" class="admin-field bg-white md:col-span-2">
                <input name="watermark_opacity" type="number" min="5" max="90" value="{{ $cfg('watermark_opacity', '22') }}" class="admin-field bg-white">
                <input name="watermark_size" type="number" min="18" max="96" value="{{ $cfg('watermark_size', '42') }}" class="admin-field bg-white">
            </div>
            <select name="watermark_position" class="mt-4 w-full border border-neutral-300 bg-white px-3 py-2 text-sm focus:border-black focus:outline-none">
                @foreach (['bottom-right' => 'Inferior direita', 'bottom-left' => 'Inferior esquerda', 'top-right' => 'Superior direita', 'top-left' => 'Superior esquerda', 'center' => 'Centro'] as $value => $label)
                    <option value="{{ $value }}" @selected($cfg('watermark_position', 'bottom-right') === $value)>{{ $label }}</option>
                @endforeach
            </select>
        </div>

        <div class="border border-neutral-200 bg-neutral-100 p-5 lg:col-span-6">
            <h4 class="mb-4 font-serif text-xl">Cores do site</h4>
            <div class="grid grid-cols-2 gap-4 md:grid-cols-4">
                <label class="block text-sm text-neutral-500">Fundo <input name="site_bg_color" type="color" value="{{ $cfg('site_bg_color', '#f5f5f5') }}" class="mt-2 h-11 w-full cursor-pointer border border-neutral-300 bg-white"></label>
                <label class="block text-sm text-neutral-500">Texto <input name="site_text_color" type="color" value="{{ $cfg('site_text_color', '#171717') }}" class="mt-2 h-11 w-full cursor-pointer border border-neutral-300 bg-white"></label>
                <label class="block text-sm text-neutral-500">Destaque <input name="site_accent_color" type="color" value="{{ $cfg('site_accent_color', '#000000') }}" class="mt-2 h-11 w-full cursor-pointer border border-neutral-300 bg-white"></label>
                <label class="block text-sm text-neutral-500">Admin <input name="admin_accent_color" type="color" value="{{ $cfg('admin_accent_color', '#000000') }}" class="mt-2 h-11 w-full cursor-pointer border border-neutral-300 bg-white"></label>
            </div>
        </div>

        <div class="lg:col-span-12">
            <button type="submit" class="bg-black px-8 py-4 font-mono text-xs uppercase tracking-widest text-white">Salvar configurações do site</button>
        </div>
    </form>

    @include('admin.partials.sections.summary')
</section>
