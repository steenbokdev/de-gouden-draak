@extends('layouts.base', [
    'title' => __('dish/index.page_title'),
    'action' => __('dish/edit.page.action')
])

@section('addons')
    <a class="button is-danger is-outlined">
        {{ __('dish/edit.delete') }}
    </a>
@endsection

@section('content')
    <form action="{{ route('dishes.update', $dish) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="field is-horizontal">
            <div class="field-body">
                <x-form.input label="{{ __('dish/shared.menu_number') }}" type="number" value="{{ $dish->menu_number }}" />
                <x-form.input label="{{ __('dish/shared.menu_addition') }}" type="text" value="{{ $dish->menu_addition }}" />
            </div>
        </div>

        <div class="field is-horizontal">
            <div class="field-body">
                <x-form.input label="{{ __('dish/shared.name') }}" type="text" value="{{ $dish->name }}" />
                <x-form.input label="{{ __('dish/shared.price') }}" type="number" step="0.01" value="{{ $dish->price }}" />
                <x-form.input label="{{ __('dish/shared.category') }}" type="text" value="{{ $dish->category }}" />
            </div>
        </div>

        <x-form.textarea label="{{ __('dish/shared.description') }}" type="text" value="{{ $dish->description }}" />

        <x-form.controls primary-text="{{ __('dish/edit.form_controls.primary') }}"
                         secondary-text="{{ __('dish/edit.form_controls.secondary') }}" />
    </form>
@endsection
