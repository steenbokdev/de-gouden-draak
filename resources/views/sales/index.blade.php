@extends('layouts.base', [
    'title' => __('sales/index.page_title')
])

@section('addons-left')
    <form action="{{ route('sales.index') }}" method="GET">
        <div class="field is-grouped">
            <x-form.date id="date_from" label="{{ __('sales/index.filter.start_date') }}" value="{{ $dateFrom }}"/>
            <x-form.date id="date_to" label="{{ __('sales/index.filter.end_date') }}" value="{{ $dateTo }}"/>

            <div class="field">
                <button class="button is-primary">
                    {{ __('sales/index.filter.apply') }}
                </button>
            </div>

            <div class="field">
                <x-form.reset-filter route="{{ route('sales.index') }}"/>
            </div>
        </div>
    </form>
@endsection

@section('content')
    <div class="table-container">
        <table class="table is-striped is-narrow is-hoverable is-fullwidth">
            <thead>
                <tr>
                    <th>
                        {{ __('sales/index.order_date')}}
                    </th>
                    <th>
                        {{ __('dish/shared.menu_number') }}
                    </th>
                    <th>
                        {{ __('dish/shared.name') }}
                    </th>
                    <th>
                        {{ __('dish/shared.price') }} in &euro;
                    </th>
                    <th>
                        {{ __('sales/index.count') }}
                    </th>
                    <th>
                        {{ __('sales/index.total') }} in &euro;
                    </th>
                </tr>
            </thead>

            <tbody>
                @forelse ($sales as $sale)
                    <tr>
                        <td>
                            {{ $sale->created_at }}
                        <td>
                            {{ $sale->dish->menu_number }}
                            {{ $sale->dish->menu_addition }}
                        </td>
                        <td>
                            {{ $sale->dish->name }}
                        </td>
                        <td>
                            &euro; {{ $sale->price_per_item }}
                        </td>
                        <td>
                            {{ $sale->item_count }}
                        </td>
                        <td>
                            &euro; {{ $sale->price_per_item * $sale->item_count }}
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
