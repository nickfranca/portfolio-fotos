@php
    $foto = $foto ?? null;
@endphp

<div class="border border-neutral-200 bg-neutral-100 p-4">
    <h4 class="font-serif text-lg">Enquadramento</h4>
    <p class="mt-1 text-xs leading-relaxed text-neutral-500">Mostre a foto inteira ou preencha o espaço com corte visual.</p>
    <div class="mt-4 grid grid-cols-1 gap-3 md:grid-cols-3">
        <label class="text-xs text-neutral-500">Ajuste
            <select name="ajuste" class="mt-1 w-full border border-neutral-300 bg-white px-2 py-2 text-sm">
                <option value="cover" @selected(($foto?->ajuste ?? 'cover') === 'cover')>Preencher/cortar</option>
                <option value="contain" @selected(($foto?->ajuste ?? 'cover') === 'contain')>Mostrar inteira</option>
            </select>
        </label>
        <label class="text-xs text-neutral-500">Horizontal
            <select name="posicao_x" class="mt-1 w-full border border-neutral-300 bg-white px-2 py-2 text-sm">
                @foreach (['center' => 'Centro', 'left' => 'Esquerda', 'right' => 'Direita'] as $value => $label)
                    <option value="{{ $value }}" @selected(($foto?->posicao_x ?? 'center') === $value)>{{ $label }}</option>
                @endforeach
            </select>
        </label>
        <label class="text-xs text-neutral-500">Vertical
            <select name="posicao_y" class="mt-1 w-full border border-neutral-300 bg-white px-2 py-2 text-sm">
                @foreach (['center' => 'Centro', 'top' => 'Topo', 'bottom' => 'Base'] as $value => $label)
                    <option value="{{ $value }}" @selected(($foto?->posicao_y ?? 'center') === $value)>{{ $label }}</option>
                @endforeach
            </select>
        </label>
    </div>
</div>
