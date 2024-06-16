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
                                  label="{{ __('header.routes.home') }}" />

            <x-header.navbar-item route="{{ route('cocktail.index') }}"
                                  label="{{ __('header.routes.cocktail') }}" />

            @if(auth()->user())
                @if(auth()->user()->isEmployee())
                    <x-header.navbar-item route="{{ route('dishes.index') }}"
                                          label="{{ __('header.routes.dishes') }}" />

                    <x-header.navbar-item route="{{ route('deals.index') }}"
                                          label="{{ __('header.routes.deals') }}" />

                    <x-header.navbar-item route="{{ route('checkout.index') }}"
                                          label="{{ __('header.routes.checkout') }}" />

                    <x-header.navbar-item route="{{ route('sales.index') }}"
                                          label="{{ __('header.routes.sales') }}" />

                    <x-header.navbar-item route="{{ route('rounds.index') }}"
                                          label="{{ __('header.routes.rounds') }}" />
                @else
                    <x-header.navbar-item route="{{ route('order.index') }}"
                                          label="{{ __('header.routes.order') }}" />
                @endif
            @endif
        </div>

        <div class="navbar-end">
            <a class="navbar-item">
                @include('layouts.partials.lang')
            </a>

            @if(auth()->user())
                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link">
                        <span class="icon-text">
                            <span class="icon">
                                <i class="fa-regular fa-user"></i>
                            </span>
                            <span>
                                {{ __('header.greet') }}, {{ auth()->user()->firstname }}
                            </span>
                        </span>
                    </a>

                    <div class="navbar-dropdown is-right">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            @method('POST')

                            <a href="{{ route('logout') }}" class="navbar-item">
                                <button type="submit">
                                    <span class="icon-text">
                                        <span class="icon">
                                            <i class="fa-regular fa-arrow-right-from-bracket"></i>
                                        </span>

                                        <span>
                                            {{ __('header.routes.logout') }}
                                        </span>
                                    </span>
                                </button>
                            </a>
                        </form>
                    </div>
                </div>
            @else
                <a href="{{ route('login-tablet') }}" class="navbar-item">
                    <button class="button is-primary is-outlined">
                        {{ __('header.routes.login_tablet') }}
                    </button>
                </a>
                <a href="{{ route('login') }}" class="navbar-item">
                    <button class="button is-primary">
                        {{ __('header.routes.login') }}
                    </button>
                </a>
            @endif
        </div>
    </div>
</nav>
