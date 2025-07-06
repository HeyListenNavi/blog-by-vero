@props([
    'label',
    'id',
    'name' => $id,
    'type' => 'text',
    'placeholder',
    'required' => false,
    'autofocus' => false,
    'value',
])

<fieldset
    {{ $attributes->merge(['class' => 'flex flex-col gap-1']) }}
>
    <label for="user">{{ $label }}</label>
    <input
        class="w-full border-[3px] border-foreground focus:border-highlight p-2 outline-none"
        @isset($placeholder)
        placeholder="{{ $placeholder }}"
        @endisset
        type="{{ $type }}"
        name="{{ $name }}"
        @if ($required)
        required
        @endif
        @if ($autofocus)
        autofocus
        @endif
        @isset($value)
        value="{{ $value }}"
        @endisset
    >
</fieldset>