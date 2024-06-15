<table class="nav-table">
    <tr>
        <td colspan='3'>
            <p>
                <img src="{{ asset('images/dragon-small.png') }}" class="nav-image" alt="Golden Dragon">
                <img src="{{ asset('images/dragon-small-flipped.png') }}" class="nav-image-flipped" alt="Golden Dragon">
                <span class="nav-title">{{ __('customer/layout.nav.title') }}</span><br>
                <span class="nav-subtitle">De Gouden Draak</span><br>
            </p>
            <table class="nav-table-inner">
                <tr>
                    <td class="nav-link-cell">
                        <a href="{{ route('customer.menu') }}" class="nav-link">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ __('customer/layout.nav.menu-card') }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </a>
                    </td>
                    <td class="nav-link-cell">
                        <a href="{{ route('customer.news') }}" class="nav-link">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ __('customer/layout.nav.news') }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </a>
                    </td>
                    <td class="nav-link-cell">
                        <a href="{{ route('customer.contact') }}" class="nav-link">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ __('customer/layout.nav.contact') }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </a>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr class="nav-row">
        <td colspan="3" height="50px">
        </td>
    </tr>
    <tr class="nav-row">
        <td class="nav-cell">
        </td>
        <td class="nav-content-cell">
            @yield('content')
        </td>
        <td class="nav-cell">
        </td>
    </tr>
</table>
