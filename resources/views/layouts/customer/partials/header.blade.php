<table id="main_table" class="main-table">
    <tr class="table-row">
        <td class="table-cell">
            <img src="{{ asset('images/dragon-small.png') }}" alt="Golden Dragon" height="50px">
            <span>De Gouden Draak</span>
            <img src="{{ asset('images/dragon-small-flipped.png') }}" alt="Golden Dragon" height="50px">
        </td>
        <td class="marquee-container">
            <a href="{{ route('customer.index') }}">
                <div class="marquee">
                    {{ __('customer/layout.header.marquee') }}
                </div>
            </a>
        </td>
        <td class="table-cell">
            <img src="{{ asset('images/dragon-small.png') }}" alt="Golden Dragon" height="50px">
            <span>De Gouden Draak</span>
            <img src="{{ asset('images/dragon-small-flipped.png') }}" alt="Golden Dragon" height="50px">
        </td>
    </tr>
</table>
