@extends('layouts.app')
@section('title', 'Create Service')

@section('content')
    @include('admin.profile.partials.header')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Create Service</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('admin.service.index') }}" class="btn btn-sm btn-primary">Service</a>
                            </div>
                        </div>
                    </div>
                    <form action="{{route('admin.service.store')}}" method="POST" enctype="multipart/form-data">
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
                                <label> Tanker </label>
                                <input type="text" class="form-control" name="tanker" placeholder="Enter the Tanker">
                            </div>
                            <div class="form-group">
                                <label> Harvest </label>
                                <input type="text" class="form-control" name="harvest" placeholder="Enter the Harvest">
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-success"> Create Service </button>
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
