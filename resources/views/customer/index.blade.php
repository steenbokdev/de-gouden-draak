@extends('layouts.customer.base')

@section('content')
    <h3>Al jaren is De Gouden Draak een begrip als het gaat om de beste afhaalgerechten in 's-Hertogenbosch.<br>
        Graag trakteren we u op authentieke gerechten uit de Cantonese keuken.</h3>
    <br>
    <h2><u>Aanbiedingen</u></h2>
    @foreach($deals as $deal)
        <h1>{{ $deal->name }}</h1>
        <h3>
            {{ __('customer/index.discount_text', ['price' => $deal->price, 'discount_price' => $deal->discount_price]) }}
            <br><br>
        </h3>
    @endforeach
@endsection
