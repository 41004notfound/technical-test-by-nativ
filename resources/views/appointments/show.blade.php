@extends('layout.app')

@section('content')
    <appointment-show
        :appointment-id="{{ $appointment->id }}"
    ></appointment-show>
@endsection
