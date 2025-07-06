@if ($paginator->hasPages())
    <nav>
        <ul class="custom-pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled"><span>Prev</span></li>
            @else
                <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">Prev</a></li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="disabled"><span>{{ $element }}</span></li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active"><span>{{ $page }}</span></li>
                        @else
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">Next</a></li>
            @else
                <li class="disabled"><span>Next</span></li>
            @endif
        </ul>
    </nav>

    <style>
    .custom-pagination {
        list-style: none;
        display: flex;
        gap: 8px;
        justify-content: center;
        margin-top: 32px;
        padding-left: 0;
    }

    .custom-pagination li {
        display: inline;
    }

    .custom-pagination a,
    .custom-pagination span {
        display: block;
        padding: 6px 12px;
        border-radius: 6px;
        border: 1px solid #ccc;
        font-size: 14px;
        color: #333;
        text-decoration: none;
    }

    .custom-pagination .active span {
        background-color: #C62828;
        color: white;
        border-color: #C62828;
    }

    .custom-pagination .disabled span {
        color: #999;
        background-color: transparent;
        cursor: default;
    }

    .custom-pagination a:hover {
        background-color: #f0f0f0;
    }
</style>

@endif
