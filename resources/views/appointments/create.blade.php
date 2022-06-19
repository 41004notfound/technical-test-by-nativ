@extends('layout.app')

@section('content')
    <appointment-form
        :appointment-show-route="{{ json_encode(route('appointments.show', ':appointmentID')) }}"
    ></appointment-form>
@endsection
