@extends('layouts.base', [
    'title' => __('cocktail/index.page_title')
])

@section('content')
    <div class="fixed-grid has-3-cols">
        <div class="grid">
            @forelse ($cocktails as $cocktail)
                <div class="cell">
                    <x-cocktail.showcase-item src="{{ $cocktail->strDrinkThumb }}" content="{{ $cocktail->strDrink }}"/>
                </div>
            @empty
                <div class="cell">
                    <em>
                        {{ __('cocktail/index.failed.message') }}

                        <a href="{{ route("cocktail.index") }}">
                            {{ __('cocktail/index.failed.try_again') }}
                        </a>
                    </em>
                </div>
            @endforelse
        </div>
    </div>
@endsection
