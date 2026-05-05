@if (session('success'))
    <div class="mb-8 border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-800">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="mb-8 border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-800">
        <strong class="block font-mono text-xs uppercase tracking-widest">Revise os campos</strong>
        <ul class="mt-2 list-disc space-y-1 pl-5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
