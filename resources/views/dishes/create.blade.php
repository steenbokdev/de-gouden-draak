@extends('layouts.base', [
    'title' => __('dish/index.page_title'),
    'action' => __('dish/create.page.action')
])

@section('content')
    <form action="{{ route('dishes.store') }}" method="POST">
        @csrf
        @method('POST')

        <div class="field is-horizontal">
            <div class="field-body">
                <x-form.input id="menu_number" label="{{ __('dish/shared.menu_number') }}" type="number" placeholder="{{ __('dish/create.placeholder.menu_number') }}" />
                <x-form.input id="menu_addition" label="{{ __('dish/shared.menu_addition') }}" type="text" placeholder="{{ __('dish/create.placeholder.menu_addition') }}" />
            </div>
        </div>

        <div class="field is-horizontal">
            <div class="field-body">
                <x-form.input id="name" label="{{ __('dish/shared.name') }}" type="text" placeholder="{{ __('dish/create.placeholder.name') }}" />
                <x-form.input id="price" label="{{ __('dish/shared.price') }}" type="number" step="0.01" placeholder="{{ __('dish/create.placeholder.price') }}" />
                <x-form.input id="category" label="{{ __('dish/shared.category') }}" type="text" placeholder="{{ __('dish/create.placeholder.category') }}" />
            </div>
        </div>

        <x-form.textarea id="description" label="{{ __('dish/shared.description') }}" type="text" placeholder="{{ __('dish/create.placeholder.description') }}" />

        <div class="field is-horizontal">
            <div class="field-body">
                <x-go-back label="{{ __('dish/create.return') }}" route="{{ route('dishes.index') }}" />

                <x-form.controls primary-text="{{ __('dish/create.form_controls.primary') }}"
                                 secondary-text="{{ __('dish/create.form_controls.secondary') }}" />
            </div>
        </div>
    </form>
@endsection
