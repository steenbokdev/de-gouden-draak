@extends('layouts.customer.base')

@section('content')
    <h3>
        {{ __('customer/index.title') }}
        <br>
        {{ __('customer/index.sub_title') }}
    </h3>
    <br>
    <h2><u>{{ __('customer/index.deals') }}</u></h2>
    @forelse($deals as $deal)
        <h1>{{ $deal->name }}</h1>
        <h3>
            {{ __('customer/index.discount_text', ['price' => $deal->price, 'discount_price' => $deal->discount_price]) }}
            <br><br>
        </h3>
    @empty
        <h4>{{ __('customer/index.no_deals') }}</h4>
    @endforelse
@endsection
