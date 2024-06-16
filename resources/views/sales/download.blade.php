<h1>
    VERKOOPCIJFERS {{ $date }}
</h1>

<table>
    <thead>
        <tr>
            <th>
                Tijdstip
            </th>
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
                {{ __('sales/index.count') }}
            </th>
            <th>
                {{ __('sales/index.total') }}
            </th>
        </tr>
    </thead>

    <tbody>
        @forelse ($sales as $sale)
            <tr>
                <td>
                    {{ $sale->created_at->format('H:i') }}
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

<span>
    <h2>
        Totale omzet:
    </h2>

    &euro; {{ $totalPrice }}
</span>