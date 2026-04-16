<div style="width: 100%; height: 600px; border-radius: 0.5rem; overflow: hidden; border: 1px solid #ddd; background: #fff;">
    @php
        $url = $getState();
    @endphp
    @if ($url)
        <iframe src="{{ $url }}" style="width: 100%; height: 100%; border: none;" loading="lazy"></iframe>
    @else
        <div class="p-4 text-gray-500">No preview available</div>
    @endif
</div>
