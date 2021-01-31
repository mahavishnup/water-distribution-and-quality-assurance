@extends('layouts.app', ['class' => 'bg-default'])
@section('title','Package')

@section('content')
    <div class="header bg-gradient-primary py-7 py-lg-8">
        <div class="container">
            <div class="text-center">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <h1 class="text-white">Weekly: {{ $package->weekly }}</h1>
                        <h3 class="text-white">Monthly: {{ $package->monthly }}</h3>
                        <b style="color: #ffffff !important;font-size: 1rem;font-weight: normal">Yearly: {!! $package->yearly !!}</b>
                        <b style="color: #ffffff !important;font-size: 1rem;font-weight: normal">Service: {!! $package->service !!}</b>
                    </div>
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
