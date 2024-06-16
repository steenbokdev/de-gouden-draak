@extends('layouts.base', [
    'title' => __('customer/order.page_title') . ' - ' . auth()->user()->firstname . ' - ' . __('customer/order.round', ['round' => $round])
])

@push('scripts')
    <script src="{{ asset('js/order-modal.js') }}" defer></script>
    <script src="{{ asset('js/order.js') }}" defer></script>
@endpush

@section('addons-left')
    <button id="button-order" class="js-modal-trigger button is-primary is-outlined" data-target="modal-order">
        {{ __('customer/order.order_watch') }}
    </button>

    <div id="modal-order" class="modal">
        <div class="modal-background"></div>

        <div class="modal-content">
            <div class="box">
                <div id="order-dishes"></div>
            </div>
        </div>

        <button class="modal-close is-large" aria-label="close"></button>
    </div>
@endsection

@section('addons-right')
    @if($canPlaceOrder)
        <form id="place-order-form" action="{{ route('order.store') }}" method="post">
            @csrf
            @method('POST')

            <button type="submit" id="place-order-button" class="button is-primary">
                {{ __('customer/order.place_order') }}
            </button>
        </form>
    @else
        <button class="button is-primary" disabled>
            {{ __('customer/order.place_order') }}
        </button>
    @endif
@endsection

@section('content')
    <div class="table-container">
        <table class="table is-striped is-narrow is-hoverable is-fullwidth">
            <thead>
            <tr>
                <th>
                    {{ __('dish/shared.menu_number') }}
                </th>
                <th>
                    {{ __('dish/shared.name') }}
                </th>
                <th>
                    {{ __('dish/shared.price') }}
                </th>
                <th>
                    {{ __('dish/shared.category') }}
                </th>
                <th>
                    {{ __('dish/shared.description') }}
                </th>
                <th>
                    {{ __('dish/shared.quantity') }}
                </th>
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
                                    &euro;{{ $dish->price }}
                                </s>
                                &euro;{{ $dish->discount_price }}
                                @else
                                    &euro;{{ $dish->price }}
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
                        <p class="control">
                            <input class="input" id="{{ $dish->id }}" name="quantity"
                                   data-dish="{{ $dish }}" style="max-width: fit-content" type="number" placeholder="0">
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
@endsection
