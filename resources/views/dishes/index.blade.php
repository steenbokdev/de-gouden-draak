@extends('layouts.base', [
    'title' => __('dish/index.page_title')
])

@section('addons')
    <a class="button is-primary">
        {{ __('dish/index.add_dish') }}
    </a>
@endsection

@section('content')
    <div class="table-container">
        <table class="table is-striped is-narrow is-hoverable is-fullwidth">
            <thead>
                <tr>
                    <th>
                        @sortablelink('menu_number', __('dish/shared.menu_number'))
                    </th>
                    <th>
                        @sortablelink('name', __('dish/shared.name'))
                    </th>
                    <th>
                        {{ __('dish/shared.price') }}
                    </th>
                    <th>
                        @sortablelink('category', __('dish/shared.category'))
                    </th>
                    <th>
                        {{ __('dish/shared.description') }}
                    </th>
                    <th>
                        {{ __('dish/index.actions') }}
                    </th>
                </tr>
            </thead>

            <tbody>
                @foreach ($dishes as $dish)
                    <tr>
                        <td>
                            @isset($dish->menu_number)
                                {{ $dish->menu_number }}.
                            @endisset

                            {{ $dish->menu_addition }}
                        </td>
                        <td>
                            {{ $dish->name }}
                        </td>
                        <td>
                            @isset($dish->price)
                                &euro; {{ $dish->price }}
                            @endisset
                        </td>
                        <td>
                            {{ $dish->category }}
                        </td>
                        <td>
                            {{ $dish->description }}
                        </td>
                        <td>
                            <a class="has-text-info">
                                <span class="icon is-medium">
                                    <i class="fa-solid fa-lg fa-pen-to-square"></i>
                                </span>
                            </a>
                            <a class="has-text-danger">
                                <span class="icon is-medium">
                                    <i class="fa-solid fa-lg fa-trash-can"></i>
                                </span>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
