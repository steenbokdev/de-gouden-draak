@extends('layouts.base', [
    'title' => __('cocktail/index.page_title')
])

@section('addons')
    <x-form.reset-filter route="{{ route('cocktail.index') }}"/>
@endsection

@section('addons-left')
    <form action="{{ route('cocktail.index') }}" method="GET">
        <x-form.search id="search" route="{{ route('cocktail.index') }}" type="text" placeholder="{{ __('cocktail/index.search') }}" value="{{ $searchQuery }}"/>
    </form>
@endsection

@section('addons-right')
    <form action="{{ route('cocktail.index') }}" method="GET">
        <div class="field is-grouped">
            <x-form.select id="category">
                @foreach ($categories['collection'] as $key => $value)
                    <option value="{{ $key }}" @selected($key === $categories['selected'])>
                        {{ $value }}
                    </option>
                @endforeach
            </x-form.select>

            <button type="submit" class="button is-primary">
                {{ __('cocktail/index.filter.apply') }}
            </button>
        </div>
    </form>
@endsection

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
