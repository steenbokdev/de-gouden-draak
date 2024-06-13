<h1>
    Het menu van De Gouden Draak
</h1>

@foreach($dishes as $category => $group)
    <h2>
        @if($category)
            {{ str($category)->upper() }}
        @else
            GEEN CATEGORIE
        @endif
    </h2>

    @foreach($group as $dish)
        {{ $dish['menu_number'] }}{{ $dish['menu_addition'] }}. {{ $dish['name'] }} @if($dish['description'])<i>({{ $dish['description'] }})</i>@endif - &euro; {{ $dish['price'] }}
        <br>
    @endforeach
@endforeach
