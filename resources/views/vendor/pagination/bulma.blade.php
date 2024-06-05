<nav class="pagination is-centered" role="navigation">
    <a href="{{ $paginator->previousPageUrl() }}" class="pagination-previous">
        {{ __('pagination.previous') }}
    </a>

    <a href="{{ $paginator->nextPageUrl()  }}" class="pagination-next">
        {{ __('pagination.next') }}
    </a>

    <ul class="pagination-list">
        @foreach ($elements as $element)
            @if (is_string($element))
                <li>
                    <span class="pagination-ellipsis">
                        &hellip;
                    </span>
                </li>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li>
                            <a class="pagination-link is-current">
                                {{ $page }}
                            </a>
                        </li>
                    @else
                        <li>
                            <a href="{{ $url  }}" class="pagination-link">
                                {{ $page }}
                            </a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach
    </ul>
</nav>

