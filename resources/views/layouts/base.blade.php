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
            <section class="section">
                <main class="container hero is-large">
                    @yield('content')
                </main>
            </section>

            <div class="hero-foot">
                @include('layouts.partials.footer')
            </div>
        </div>
    </body>
</html>
