@if(app()->getLocale() == "sr")
<li><a href="{{ $item['link'] }}" title="" class="{{ $item['class'] }}">{{ $item['label'] }}</a>
    @if( $item['child'] )
        <ul class="dropdown-content">
            @each('partials.menu', $item['child'], 'item')
        </ul>
    @endif
</li>
@else
    <li><a href="{{ $item['link_en'] }}" title="" class="{{ $item['class'] }}">{{ $item['label_en'] }}</a>
        @if( $item['child'] )
            <ul class="dropdown-content">
                @each('partials.menu', $item['child'], 'item')
            </ul>
        @endif
    </li>
@endif
