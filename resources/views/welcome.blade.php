@extends('layouts.base', [
    'title' => 'Index',
])

@section('content')
<span class="icon-text">
    <span class="is-size-4">
        {{ __('welcome.welcome') }}
    </span>
    <span class="icon">
        <i class="fa-solid fa-earth-europe"></i>
    </span>
</span>
@endsection
