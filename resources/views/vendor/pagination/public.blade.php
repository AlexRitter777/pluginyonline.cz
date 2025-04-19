@if ($paginator->hasPages())
    <nav class="flex justify-center mt-8" role="navigation" aria-label="Pagination Navigation">
        <ul class="inline-flex space-x-2 text-body-color text-base">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li>
                    <span class="px-2 py-1 text-body-color">&laquo;</span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                       class="px-2 py-1 hover:text-primary">
                        &laquo;
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                @if (is_string($element))
                    <li>
                        <span class="px-2 py-1">{{ $element }}</span>
                    </li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li>
                                <span class="px-2 py-1 text-primary font-semibold">{{ $page }}</span>
                            </li>
                        @else
                            <li>
                                <a href="{{ $url }}" class="px-2 py-1 hover:text-primary">
                                    {{ $page }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                       class="px-2 py-1 hover:text-primary">
                        &raquo;
                    </a>
                </li>
            @else
                <li>
                    <span class="px-2 py-1 text-body-color">&raquo;</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
