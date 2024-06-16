@extends('layouts.base', [
    'title' => __('sales/feedback.thank_you')
])

@section('content')
    <x-go-back route="{{ route('home') }}" label="{{ __('sales/feedback.go_back') }}"/>
@endsection
