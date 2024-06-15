@extends('layouts.base', [
    'title' => __('employee/employee.page_title')
])

@section('content')
    <form action="{{ route('authenticate') }}" method="POST">
        @csrf
        @method('POST')

        <x-form.input id="employee_id" label="{{ __('employee/employee.employee_id.term') }}" type="number"/>
        <x-form.input id="password" label="{{ __('employee/employee.password') }}" type="password"/>

        <x-form.controls primary-text="{{ __('employee/employee.form_controls.primary') }}" secondary-text="{{ __('employee/employee.form_controls.secondary') }}"/>
    </form>
@endsection
