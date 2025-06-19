@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="pagination">
        <ul class="inline-flex items-center -space-x-px text-sm">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled">
                    <span class="page-link">&laquo;</span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="page-link">&laquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled">
                        <span class="page-link">{{ $element }}</span>
                    </li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active" aria-current="page">
                                <span class="page-link">{{ $page }}</span>
                            </li>
                        @else
                            <li>
                                <a href="{{ $url }}" class="page-link">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="page-link">&raquo;</a>
                </li>
            @else
                <li class="disabled">
                    <span class="page-link">&raquo;</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
