@extends('layouts.base', [
    'title' => __('dish/index.page_title')
])

@section('addons')
    <a href="{{ route('dishes.create') }}" class="button is-primary">
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
                        {{ __('dish/index.actions.term') }}
                    </th>
                </tr>
            </thead>

            <tbody>
                @forelse ($dishes as $dish)
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
                            <a href="{{ route('dishes.edit', $dish) }}">
                                {{ __('dish/index.actions.edit') }}
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">
                            <em>
                                {{ __('dish/index.empty') }}
                            </em>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{ $dishes->appends(request()->except('page'))->links('vendor.pagination.bulma') }}
@endsection
