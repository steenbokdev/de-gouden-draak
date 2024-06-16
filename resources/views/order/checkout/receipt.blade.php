<style>
    @page { 
        margin: 5px; 
    }
</style>

<table style="margin-left: 35px;">
    <tr>
        <td>
            <img src="data:image/png;base64,{{ $logoImage }}" width="30px" height="30px"/>

        </td>
        <td>
            <h3>{{ config('app.name') }}</h3>
        </td>
        <td>
            <img src="data:image/png;base64,{{ $logoImageFlipped }}" width="30px" height="30px"/>
        </td>
    </tr>
</table>

<table style="width: 100%;">
    <thead>
        <tr>
            <th style="font-size: 9px;">
                {{ __('dish/shared.name') }}
            </th>
            <th style="font-size: 9px;">
                {{ __('dish/shared.price') }}
            </th>
            <th style="font-size: 9px;">
                {{ __('sales/index.count') }}
            </th>
            <th style="font-size: 9px;">
                {{ __('sales/index.total') }}
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($sales as $sale)
            <tr>
                <td style="font-size: 9px;">
                    {{ $sale->dish->name }}
                </td>
                <td style="font-size: 9px;">
                    &euro; {{ $sale->price_per_item }}
                </td>
                <td style="font-size: 9px;">
                    {{ $sale->item_count }}
                </td>
                <td style="font-size: 9px;">
                    &euro; {{ $sale->price_per_item * $sale->item_count }}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<span style="font-size: 9px;">
    <strong>
        Totaal:
    </strong>
    &euro; {{ $totalPrice }}
</span>
