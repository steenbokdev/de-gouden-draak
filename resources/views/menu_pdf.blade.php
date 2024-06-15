<h1>
    {{ __('menu/download.title') }}
</h1>

@foreach($dishes as $category => $group)
    <h3>
        @if($category)
            {{ str($category)->upper() }}
        @else
            {{ __('menu/download.no_category') }}
        @endif
    </h3>

    @foreach($group as $dish)
        {{ $dish['menu_number'] . $dish['menu_addition'] }}. {{ $dish['name'] }}

        @if($dish['description'])
            <i>({{ $dish['description'] }})</i>
        @endif

        - &euro; {{ $dish['price'] }}

        <br>
    @endforeach
@endforeach

@if($discounts->count())
    <div style="page-break-before: always;"></div>

    <h1>
        {{ __('menu/download.discounts') }}
    </h1>

    @foreach($discounts as $discount)
        {{ $discount['menu_number'] . $discount['menu_addition'] }}. {{ $discount['name'] }}

        @if($dish['description'])
            <i>({{ $dish['description'] }})</i>
        @endif

        - <s>
            &euro; {{ $discount['price'] }}
        </s>

        &euro; {{ $discount['discount_price'] }}

        <br>
    @endforeach
@endif
