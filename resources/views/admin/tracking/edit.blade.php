@extends('layouts.app')
@section('title', 'Edit Tracking')

@section('content')
    @include('admin.profile.partials.header')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Edit Tracking</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('admin.tracking.index') }}" class="btn btn-sm btn-primary">Tracking</a>
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('admin.tracking.update',$tracking->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
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
                                <label> From </label>
                                <input type="hidden" class="form-control" name="id" value="{{$tracking->id}}">
                                <input type="text" class="form-control" name="from" value="{{$tracking->from}}">
                            </div>
                            <div class="form-group">
                                <label> Current </label>
                                <input type="text" class="form-control" name="current" value="{{$tracking->current}}">
                            </div>
                            <div class="form-group">
                                <label> To </label>
                                <input type="text" class="form-control" name="to" value="{{$tracking->to}}">
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-success"> Save </button>
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
