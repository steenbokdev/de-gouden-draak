<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>
            @isset($title)
                {{ $title }} |
            @endisset

            {{ config('app.name') }}
        </title>
    </head>

    <body>
        @yield('content')
    </body>
</html>
