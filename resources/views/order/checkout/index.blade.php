@extends('layouts.base', [
    'title' => __('checkout/index.page_title')
])

@section('content')
    <div class="columns">
        <div class="column is-three-fifths">
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
                                {{ __('checkout/index.side_dish') }}
                            </th>
                            <th>
                                {{ __('dish/index.actions.term') }}
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
                                    <div data-side-dish="{{ $dish->menu_number }}#{{ $dish->name }}">
                                        <x-form.select id="">
                                            <option>Geen bijgerecht</option>
                                            <option>Witte Rijst</option>
                                            <option>Nasi/bami Goreng</option>
                                            <option>Mihoen Goreng</option>
                                            <option>Chinese Bami</option>
                                        </x-form.select>
                                    </div>
                                </td>
                                <td>
                                    <a data-add-checkout-dish="{{ $dish->menu_number }}#{{ $dish->name }}#{{ $dish->discount_price ?? $dish->price }}">
                                        {{ __('checkout/index.add') }}
                                    </a>
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
        </div>

        <div class="column">
            <form action="{{ route('checkout.store') }}" method="post">
                @csrf
                @method('POST')

                <div id="checkout-container" class="p-3 mb-3 max-h-500 overflow-y"></div>
                <input type="hidden" id="order-data" name="order-data">

                <div class="field is-grouped">
                    <button id="reset-order" type="reset" class="button is-link is-outlined">
                        {{ __('checkout/index.reset') }}
                    </button>

                    <button id="submit-order" type="submit" class="button is-primary is-fullwidth">
                        {{ __('checkout/index.checkout') }} (&euro; 0,00)
                    </button>
                </div>
            </form>

            <form action="{{ route('sales.latest.download') }}" method="post" class="mt-3">
                @csrf
                @method('POST')

                <button type="submit" class="button is-ghost is-fullwidth">
                    {{ __('checkout/index.download_receipt') }}
                </button>
            </form>
        </div>
    </div>
@endsection
