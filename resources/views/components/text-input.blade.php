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
    x-data="{ showPassword: false }"
>
    <label for="user">{{ $label }}</label>
    <div class="flex items-stretch">
        <input
            class="w-full border-[3px] border-foreground focus:border-highlight p-2 outline-none"
            @isset($placeholder)
            placeholder="{{ $placeholder }}"
            @endisset
            type="{{ $type }}"
            @if($type == "password")
            x-bind:type="showPassword ? 'text' : 'password'"
            @endif
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
        @if($type == "password")
        <x-button type="button" class="font-emoji text-3xl" x-on:click="showPassword = !showPassword" x-text="showPassword ? '3' : '2'"></x-button>
        @endif
    </div>
</fieldset>
