@extends('layouts.app', ['class' => 'bg-default'])
@section('title','Quality')

@section('content')
    <div class="header bg-gradient-primary py-7 py-lg-8">
        <div class="container">
            <div class="text-center">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <h1 class="text-white">Name: {{ $customerfeedback->name }}</h1>
                        <h3 class="text-white">Phone: {{ $customerfeedback->phone }}</h3>
                    </div>
                    <b style="color: #ffffff !important;font-size: 1rem;font-weight: normal">Message: {!! $customerfeedback->message !!}</b>
                </div>
            </div>
        </div>
        <div class="separator separator-bottom separator-skew zindex-100">
            <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
    </div>

    <div class="container mt--10 pb-5"></div>
@endsection
