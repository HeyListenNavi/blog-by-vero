@props([
    'direction' => 'horizontal'
])

@if ($paginator->hasPages())
<nav
    @if ($direction == 'vertical')
        class="flex flex-col-reverse items-center gap-2"
    @else
        class="flex justify-between"
    @endif
>
    <p>
        @if ($direction == 'vertical')
            {{ $paginator->currentPage() }}
        @else
            Showing
            {{ $paginator->firstItem() }}
            to
            {{ $paginator->lastItem() }}
        @endif
        of
        {{ $paginator->total() }}
    </p>

    <div class="flex gap-1">
        @if ($paginator->onFirstPage())
        <x-button>← Previous</x-button>
        @else
        <x-button href="{{ $paginator->previousPageUrl() }}">
            ← Previous
        </x-button>
        @endif
        @if ($paginator->onLastPage())
        <x-button>Next →</x-button>
        @else
        <x-button href="{{ $paginator->nextPageUrl() }}">
            Next →
        </x-button>
        @endif
    </div>
</nav>
@endif