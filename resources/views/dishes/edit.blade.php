@extends('layouts.base', [
    'title' => __('dish/index.page_title'),
    'action' => __('dish/edit.page.action')
])

@section('addons')
    <form action="{{ route('dishes.destroy', $dish) }}" method="POST">
        @csrf
        @method('DELETE')

        <button type="submit" class="button is-danger is-outlined">
            {{ __('dish/edit.delete') }}
        </button>
    </form>
@endsection

@section('content')
    <form action="{{ route('dishes.update', $dish) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="field is-horizontal">
            <div class="field-body">
                <x-form.input id="menu_number" label="{{ __('dish/shared.menu_number') }}" type="number" value="{{ $dish->menu_number }}" />
                <x-form.input id="menu_addition" label="{{ __('dish/shared.menu_addition') }}" type="text" value="{{ $dish->menu_addition }}" />
            </div>
        </div>

        <div class="field is-horizontal">
            <div class="field-body">
                <x-form.input id="name" label="{{ __('dish/shared.name') }}" type="text" value="{{ $dish->name }}" />
                <x-form.input id="price" label="{{ __('dish/shared.price') }}" type="number" step="0.01" value="{{ $dish->price }}" />
                <x-form.input id="category" label="{{ __('dish/shared.category') }}" type="text" value="{{ $dish->category }}" />
            </div>
        </div>

        <x-form.textarea id="description" label="{{ __('dish/shared.description') }}" type="text" value="{{ $dish->description }}" />

        <div class="field is-horizontal">
            <div class="field-body">
                <x-go-back label="{{ __('dish/edit.return') }}" route="{{ route('dishes.index') }}" />

                <x-form.controls primary-text="{{ __('dish/edit.form_controls.primary') }}"
                                 secondary-text="{{ __('dish/edit.form_controls.secondary') }}" />
            </div>
        </div>
    </form>
@endsection
