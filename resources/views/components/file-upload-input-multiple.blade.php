@props(['required' => false])

<label class="block">
    <span class="sr-only">Pilih gambar promo</span>
    <input id="imgUpload" {{ $required ? 'required' : '' }} multiple {!! $attributes->merge([
        'class' => 'block w-full text-sm text-slate-500
                    file:mr-4 file:py-2 file:px-4
                    file:rounded-full file:border-0
                    file:text-sm file:font-semibold
                    file:bg-green-50 file:text-green-700
                    hover:file:bg-green-100',
    ]) !!} />
</label>