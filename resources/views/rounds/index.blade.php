@extends('layouts.base', [
    'title' => __('manage-rounds.page_title')
])

@section('content')
    <form action="{{ route('rounds.store') }}" method="post">
        @csrf
        @method('POST')
        <div class="select is-primary">
            <select name="tablet_id">
                @forelse($tablets as $tablet)
                    <option value="{{ $tablet->tablet_id }}">Tablet {{ $tablet->tablet_id }} ({{ __('manage-rounds.round') }} {{ $tablet->round }})</option>
                @empty
                    <option selected disabled value="">{{ __('manage-rounds.no_tablets') }}</option>
                @endforelse
            </select>
        </div>

        <button class="button is-primary" type="submit">{{ __('manage-rounds.reset') }}</button>
    </form>
@endsection