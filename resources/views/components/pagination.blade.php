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
    <div>
        @if ($paginator->onFirstPage())
        <span>Previous</span>
        @else
        <a href="{{ $paginator->previousPageUrl() }}">
            Previous
        </a>
        @endif
        @if ($paginator->onLastPage())
        <span>Next</span>
        @else
        <a href="{{ $paginator->nextPageUrl() }}">
            Next
        </a>
        @endif
    </div>
</nav>
@endif