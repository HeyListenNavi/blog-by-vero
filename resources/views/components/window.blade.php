@props([
    'title' => 'title',
    'buttons' => ['close']
])

<div {{ $attributes->merge(['class' => 'window']) }}>
    <div class="titlebar">
        <div class="text">{{ $title }}</div>
        <div class="buttons">
            @foreach ($buttons as $button)
              <button class="button--{{ $button }}"></button>
            @endforeach
        </div>
    </div>

    <div class="body">
        {{ $slot }}
    </div>
</div>
