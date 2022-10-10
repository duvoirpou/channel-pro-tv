<div>

    @if ($paginator->hasPages())

        <div class="row">
            <ul class="pagination">
                @if ($paginator->onFirstPage())
                    <li><a>«</a></li>
                @else
                    <li wire:click="previousPage"><a>«</a></li>
                @endif


                {{-- Numbers --}}
                @foreach ($elements as $element)
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li aria-current="page"><a class="active">{{ $page }}</a></li>
                            @else
                                <li wire:click="gotoPage({{ $page }})"><a>{{ $page }}</a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach
                {{-- Numbers --}}


                @if ($paginator->hasMorePages())
                    <li wire:click="nextPage"><a>»</a></li>
                @else
                    <li><a>»</a></li>
                @endif
            </ul>
        </div>
{{  $paginator->count() }}/{{ $paginator->total() }}
    @endif

</div>
