@extends('layouts.base', [
    'title' => __('tablet/tablet.page_title')
])

@section('content')
    <form action="{{ route('authenticate-tablet') }}" method="POST">
        @csrf
        @method('POST')

        <x-form.input id="tablet_id" label="{{ __('tablet/tablet.tablet_id.term') }}" type="number"/>
        <x-form.input id="password" label="{{ __('tablet/tablet.password') }}" type="password"/>

        <x-form.controls primary-text="{{ __('tablet/tablet.form_controls.primary') }}" secondary-text="{{ __('tablet/tablet.form_controls.secondary') }}"/>
    </form>
@endsection
