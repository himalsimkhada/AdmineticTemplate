@if ($paginator->hasPages())
    <ul class="pager">
        @if ($paginator->onFirstPage())
            <a><span class="">←</span></a>
        @else
            <a href="{{ $paginator->previousPageUrl() }}"><span class="">←</span></a>
        @endif

        @foreach ($elements as $element)

            @if (is_string($element))
                <li class="disabled"><span>{{ $element }}</span></li>
            @endif



            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <a href="#" style="background: black; color: white"><span>{{ $page }}</span></a>
                    @else
                        <a href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}"><span>→</span></a>
        @else
            <a><span class="icon-arrow"></span></a>
        @endif
    </ul>
@endif
