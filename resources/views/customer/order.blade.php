@extends('layouts.base', [
    'title' => __('customer/order.page_title') . ' - ' . auth()->user()->firstname
])

@push('scripts')
    <script src="{{ asset('js/order-modal.js') }}" defer></script>
@endpush

@section('addons-left')
    <form action="{{ route('order.index') }}" method="GET">
        <div class="field is-grouped">
            <x-form.search id="search" type="text" placeholder="{{ __('dish/index.search') }}"
                           value="{{ $searchQuery }}" />

            <div class="field is-grouped">
                <x-form.select id="category">
                    <option disabled selected>
                        {{ __('dish/index.category') }}
                    </option>

                    @foreach ($categories['collection'] as $category)
                        <option value="{{ $category }}" @selected($category === $categories['selected'])>
                            {{ $category }}
                        </option>
                    @endforeach
                </x-form.select>

                <div class="control">
                    <button type="submit" class="button is-primary">
                        {{ __('dish/index.apply') }}
                    </button>
                </div>
            </div>

            <div class="control">
                <x-form.reset-filter route="{{ route('order.index') }}" />
            </div>
        </div>
    </form>
@endsection

{{--TODO--}}
@section('addons-right')
    <button class="js-modal-trigger button is-primary is-outlined" data-target="modal-order">
        Bestelling bekijken
    </button>
    <a href="#" class="button is-primary">
        Bestelling plaatsen
    </a>

    <div id="modal-order" class="modal">
        <div class="modal-background"></div>

        <div class="modal-content">
            <div class="box">
                <p>Bestelling bekijken</p>
                <!-- Your content -->
            </div>
        </div>

        <button class="modal-close is-large" aria-label="close"></button>
    </div>
@endsection

@section('content')
    <div class="table-container">
        <table class="table is-striped is-narrow is-hoverable is-fullwidth">
            <thead>
            <tr>
                <th>
                    @sortablelink('menu_number', __('dish/shared.menu_number'))
                </th>
                <th>
                    @sortablelink('name', __('dish/shared.name'))
                </th>
                <th>
                    {{ __('dish/shared.price') }}
                </th>
                <th>
                    @sortablelink('category', __('dish/shared.category'))
                </th>
                <th>
                    {{ __('dish/shared.description') }}
                </th>
                <th />
            </tr>
            </thead>

            <tbody>
            @forelse ($dishes as $dish)
                <tr>
                    <td>
                        @isset($dish->menu_number)
                            {{ $dish->menu_number }}.
                        @endisset

                        {{ $dish->menu_addition }}
                    </td>
                    <td>
                        {{ $dish->name }}
                    </td>
                    <td>
                        @isset($dish->price)
                            @if(isset($dish->discount_price))
                                <s>
                                    &euro; {{ $dish->price }}
                                </s>
                                &euro; {{ $dish->discount_price }}
                                @else
                                    &euro; {{ $dish->price }}
                            @endif
                        @endisset
                    </td>
                    <td>
                        {{ $dish->category }}
                    </td>
                    <td>
                        {{ $dish->description }}
                    </td>
                    <td>
                        {{--TODO--}}
                        <p class="control">
                            <input class="input" style="max-width: fit-content" type="number" placeholder="0">
                        </p>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">
                        <em>
                            {{ __('dish/index.empty') }}
                        </em>
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

    {{ $dishes->appends(request()->except('page'))->links('vendor.pagination.bulma') }}
@endsection
