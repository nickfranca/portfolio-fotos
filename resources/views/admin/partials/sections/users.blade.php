<section id="usuarios" data-admin-section class="admin-section">
    @include('admin.partials.section-title', [
        'number' => '05',
        'eyebrow' => 'Segurança',
        'title' => 'Usuários',
        'description' => 'Cadastre quem pode acessar o administrativo. Cada pessoa deve ter seu próprio login.',
    ])

    <div class="grid grid-cols-1 gap-10 lg:grid-cols-12">
        <div class="lg:col-span-4">
            <h3 class="mb-6 font-serif text-3xl">Novo usuário admin</h3>
            <form action="{{ route('admin.usuarios.store') }}" method="POST" class="space-y-5 border p-5">
                @csrf
                <input name="nome" required placeholder="Nome" class="admin-field">
                <input name="email" type="email" required placeholder="Email" class="admin-field">
                <input name="login" required placeholder="Login" class="admin-field">
                <input name="password" type="password" required placeholder="Senha" class="admin-field">
                <button type="submit" class="w-full bg-black py-4 font-mono text-xs uppercase tracking-widest text-white">Criar usuário</button>
            </form>
        </div>

        <div class="lg:col-span-8">
            <div class="mb-4 flex items-center justify-between border-b border-neutral-200 pb-4">
                <h3 class="font-serif text-2xl">Usuários cadastrados</h3>
                <span class="font-mono text-xs uppercase tracking-widest text-neutral-400">{{ $usuarios->count() }} usuários</span>
            </div>

            <div class="space-y-4">
                @foreach ($usuarios as $usuario)
                    <article class="border border-neutral-200 p-4">
                        <form action="{{ route('admin.usuarios.update', $usuario) }}" method="POST" class="grid grid-cols-1 gap-4 md:grid-cols-5">
                            @csrf
                            @method('PUT')
                            <input name="nome" required value="{{ old('nome', $usuario->nome) }}" class="admin-field">
                            <input name="email" type="email" required value="{{ old('email', $usuario->email) }}" class="admin-field">
                            <input name="login" required value="{{ old('login', $usuario->login) }}" class="admin-field">
                            <input name="password" type="password" placeholder="Nova senha" class="admin-field">
                            <button type="submit" class="bg-black px-4 py-2 font-mono text-[10px] uppercase tracking-widest text-white">Salvar</button>
                        </form>

                        @if (auth()->id() !== $usuario->id)
                            <form action="{{ route('admin.usuarios.destroy', $usuario) }}" method="POST" class="mt-3 text-right" onsubmit="return confirm('Remover este usuário?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="font-mono text-[10px] uppercase tracking-widest text-red-600">Excluir usuário</button>
                            </form>
                        @endif
                    </article>
                @endforeach
            </div>
        </div>
    </div>
</section>
