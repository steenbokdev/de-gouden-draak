@extends('layouts.customer.base')

@section('content')
    <br>
    @include('customer.partials.contact-info')
    <td style="width:50px">
    </td>
    <tr style="padding-top:50px">
        <td style="width:50px">
        </td>
        <td>
            <img src="{{ asset('images/map.png') }}" width="100%" alt="Maps">
        </td>
        <td style="width:50px">
        </td>
    </tr>
@endsection
