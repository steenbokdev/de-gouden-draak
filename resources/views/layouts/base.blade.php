<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <script src="https://kit.fontawesome.com/5679c2bc30.js" crossorigin="anonymous"></script>

        @vite(['resources/scss/app.scss', 'resources/js/app.js'])
        @stack('styles')
        @stack('scripts')

        <title>
            @isset($title)
                {{ $title }} |
            @endisset

            {{ config('app.name') }}
        </title>
    </head>

    <body>
        <div class="hero is-fullheight">
            <div class="hero-head">
                @include('layouts.partials.header')
            </div>

            <section class="section">
                @include('layouts.partials.notification')

                <main class="container hero is-large">
                    @isset($title)
                        <div class="level">
                            <div class="level-left">
                                <div class="level-item">
                                    <h1 class="title is-1">
                                        {{ $title }}
                
                                        @isset($action)
                                            / {{ $action }}
                                        @endisset
                                    </h1>
                                </div>
                            </div>

                            @hasSection('addons')
                                <div class="level-right">
                                    <div class="level-item">
                                        @yield('addons')
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endisset

                    <div class="level">
                        @hasSection('addons-left')
                            <div class="level-left">
                                <div class="level-item">
                                    @yield('addons-left')
                                </div>
                            </div>
                        @endif
    
                        @hasSection('addons-right')
                            <div class="level-right">
                                <div class="level-item">
                                    @yield('addons-right')
                                </div>
                            </div>
                        @endif
                    </div>

                    <div id="app">
                        @yield('content')
                    </div>
                </main>
            </section>

            <div class="hero-foot">
                @include('layouts.partials.footer')
            </div>
        </div>
    </body>
</html>
