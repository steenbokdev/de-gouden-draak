@extends('layouts.base', [
    'title' =>  __('dish/deal.page_title'),
    'action' => join(' ', [__('dish/deal.week'), $date])
])

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
                        {{ __('dish/deal.sale_price') }}
                    </th>
                    <th>
                        {{ __('dish/index.actions.term') }}
                    </th>
                </tr>
            </thead>

            <tbody>
                @forelse ($deals as $deal)
                    <tr>
                        <td>
                            @isset($deal->dish->menu_number)
                                {{ $deal->dish->menu_number }}.
                            @endisset

                            {{ $deal->dish->menu_addition }}
                        </td>
                        <td>
                            {{ $deal->dish->name }}
                        </td>
                        <td>
                            &euro; {{ $deal->dish->price }}
                        </td>
                        <td>
                            &euro; {{ $deal->price }}
                        </td>
                        <td>
                            <form action="{{ route('deals.destroy', $deal) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button class="button is-danger is-outlined" type="submit">
                                    {{ __('dish/deal.revoke') }}
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">
                            <em>
                                {{ __('dish/deal.no_deals_found') }}
                            </em>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{ $deals->appends(request()->except('page'))->links('vendor.pagination.bulma') }}

    <hr/>

    <form action="{{ route('deals.store') }}" method="POST">
        @csrf
        @method('POST')

        <div class="field is-fullwidth">
            <x-form.select id="dish_id" label="{{ __('dish/deal.dish') }}">
                @forelse ($dishes as $deal)
                    <option value="{{ $deal->id }}">
                        {{ $deal->name }} - &euro; {{ $deal->price }}
                    </option>
                @empty
                    <option disabled>
                        {{ __('dish/index.empty') }}
                    </option>
                @endforelse
            </x-form.select>
    
            <x-form.input id="price" label="{{ __('dish/deal.sale_price') }}" type="number" step="0.01" value=""/>

            <div class="control">
                <button class="button is-primary" type="submit">
                    {{ __('dish/deal.apply') }}
                </button>
            </div>
        </div>
    </form>
@endsection
