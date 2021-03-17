@if ($paginator->hasPages())
    <div class="paginate_custom">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <a href="javascript:void(0)">@lang('content.previous')</a>
        @else
            <a href="javascript:void(0)" onclick="paginateOtherNews('{{ $paginator->previousPageUrl() }}')">@lang('content.previous')</a>
        @endif
        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="javascript:void(0)" onclick="paginateOtherNews('{{ $paginator->nextPageUrl() }}')">@lang('content.next')</a>
        @else
            <a href="javascript:void(0)">@lang('content.next')</a>
        @endif
    </div>
@endif