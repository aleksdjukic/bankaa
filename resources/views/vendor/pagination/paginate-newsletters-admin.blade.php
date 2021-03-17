@if ($paginator->hasPages())
    <div class="footer-content">
        <div class="pagination">
            <div class="numbers">
                {{$paginator->firstItem()}} - {{$paginator->lastItem()}} of {{$paginator->total()}}


            </div>
            <div class="arrows">
                @if (!$paginator->onFirstPage())
                    <a class="firstItem"
                       onclick="paginate('{{ route('newsletters-pretraga') }}', '{{ $paginator->previousPageUrl() }}', 'newsletters-ajax')"
                       href="javascript:void(0)">
                        <img src="{{ asset('images/icons8_Down_Arrow_96px_1.svg') }}" alt="Arrow">
                    </a>
                @else
                    <a>
                        <img src="{{ asset('images/icons8_Down_Arrow_96px_1.svg') }}" alt="Arrow">
                    </a>
                @endif
                @if ($paginator->hasMorePages())
                    <a class="lastItem"
                       onclick="paginate('{{ route('newsletters-pretraga') }}', '{{ $paginator->nextPageUrl() }}', 'newsletters-ajax')"
                       href="javascript:void(0)">
                        <img src="{{ asset('images/icons8_Down_Arrow_96px_1.svg') }}" alt="Arrow">
                    </a>
                @else
                    <a>
                        <img src="{{ asset('images/icons8_Down_Arrow_96px_1.svg') }}" alt="Arrow">
                    </a>
                @endif
            </div>
        </div>
    </div>
@else
    <div class="footer-content">
        <div class="pagination">
            <div class="numbers">
                {{$paginator->firstItem()}} - {{$paginator->lastItem()}} of {{$paginator->total()}}
            </div>
        </div>
    </div>
@endif
