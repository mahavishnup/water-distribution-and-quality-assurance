@extends('layouts.app')
@section('title', 'Create Quality Assurance')

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
                                <h3 class="mb-0">Create Quality Assurance</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('admin.quality.index') }}" class="btn btn-sm btn-primary">Quality Assurance</a>
                            </div>
                        </div>
                    </div>
                    <form action="{{route('admin.quality.store')}}" method="POST" enctype="multipart/form-data">
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
                                <label> Title </label>
                                <input type="text" class="form-control" name="title" placeholder="Enter the Title">
                            </div>
                            <div class="form-group">
                                <label> Body </label>
                                <textarea  rows="20" cols="50" class="form-control" name="body" placeholder="Enter the Body" ></textarea>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-success"> Create Quality Assurance </button>
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
