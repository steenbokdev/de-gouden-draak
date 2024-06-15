<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="{{ asset('css/base.css') }}" rel="stylesheet">

    <title>
        @isset($title)
            {{ $title }} |
        @endisset

        {{ config('app.name') }}
    </title>
</head>
<body>

<div class="content">
    @include('layouts.customer.partials.header')
    @include('layouts.customer.partials.main')
</div>

</body>
</html>
