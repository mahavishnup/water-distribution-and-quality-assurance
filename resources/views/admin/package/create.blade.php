@extends('layouts.app')
@section('title', 'Create Package')

@section('content')
    @include('layouts.tinyeditor')
    @include('admin.profile.partials.header')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Create Package</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('admin.package.index') }}" class="btn btn-sm btn-primary">Package</a>
                            </div>
                        </div>
                    </div>
                    <form action="{{route('admin.package.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if(Session::has('success'))
                            <div class="alert alert-success alert-dismissible text-center">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                {{ Session::get('success') }}
                            </div>
                        @elseif(Session::has('failed'))
                            <div class="alert alert-danger alert-dismissible text-center">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                {{ Session::get('failed') }}
                            </div>
                        @endif
                        <div class="card-body">
                            <div class="form-group">
                                <label> Weekly </label>
                                <input type="text" class="form-control" name="weekly" placeholder="Enter the Weekly">
                            </div>
                            <div class="form-group">
                                <label> Monthly </label>
                                <input type="text" class="form-control" name="monthly" placeholder="Enter the Monthly">
                            </div>
                            <div class="form-group">
                                <label> Yearly  </label>
                                <input type="text" class="form-control" name="yearly" placeholder="Enter the Yearly">
                            </div>
                            <div class="form-group">
                                <label> Service </label>
                                <textarea  rows="20" cols="25" class="form-control" name="service" placeholder="Enter the Service" ></textarea>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-success"> Create Package </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
