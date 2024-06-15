@extends('layouts.customer.base')

@section('content')
    <iframe src="{{ route('download.menu.show') }}" width="100%" height="500px">
    </iframe>
@endsection
