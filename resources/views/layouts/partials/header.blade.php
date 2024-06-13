<nav class="navbar" role="navigation">
    <div class="navbar-brand">
        <a class="navbar-item" href="{{ route('home') }}">
            <h4 class="title is-4">
                <strong>
                    {{ config('app.name') }}
                </strong>
            </h4>
        </a>

        <a class="navbar-burger" data-target="navbar-menu">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>

    <div id="navbar-menu" class="navbar-menu">
        <div class="navbar-start">
            <x-header.navbar-item route="{{ route('home') }}"
                                  label="{{ __('header.routes.home') }}"/>

            <x-header.navbar-item route="{{ route('dishes.index') }}"
                                  label="{{ __('header.routes.dishes') }}"/>

            <x-header.navbar-item route="{{ route('deals.index') }}"
                                  label="{{ __('header.routes.deals') }}"/>

            <x-header.navbar-item route="{{ route('cocktail.index') }}"
                                  label="{{ __('header.routes.cocktail') }}"/>
        </div>

        <div class="navbar-end">
            <a class="navbar-item">
                @include('layouts.partials.lang')
            </a>
            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link">
                    <span class="icon-text">
                        <span class="icon">
                            <i class="fa-regular fa-user"></i>
                        </span>
                        <span>
                            John Doe {{-- TODO: Temporary value, update this to the user's name when the logout is functional  --}}
                        </span>
                    </span>
                </a>

                <div class="navbar-dropdown is-right">
                    <x-header.navbar-item route=""
                                          label="{{ __('header.routes.logout') }}"
                                          icon="fa-regular fa-arrow-right-from-bracket"/>
                </div>
            </div>
        </div>
    </div>
</nav>
