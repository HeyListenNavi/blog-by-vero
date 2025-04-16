<div {{ $attributes->except('buttons')->merge(['class' => 'window']) }}>
    <div class="titlebar">
        <div class="text">{{ $title ?? 'title' }}</div>
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
