@if ($paginator->hasPages())
<nav class="flex justify-between">
    <p>
        Showing
        {{ $paginator->firstItem() }}
        to
        {{ $paginator->lastItem() }}
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