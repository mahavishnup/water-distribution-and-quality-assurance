@extends('layouts.app')
@section('title', 'All Service')

@section('content')
    @include('admin.profile.partials.header')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Service</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('admin.service.create') }}" class="btn btn-sm btn-primary">Add Service</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                    </div>
                    <div class="table-responsive">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">Tanker</th>
                                <th scope="col">Harvest</th>
                                <th scope="col">Updated Date</th>
                                <th scope="col">Created Date</th>
                                <th scope="col">View</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($services as $service)
                                <tr>
                                    <td>{{ Str::limit($service->tanker, 20) }}</td>
                                    <td>{!! Str::limit($service->harvest, 20) !!}</td>
                                    <td>{{$service->updated_at->diffForHumans()}}</td>
                                    <td>{{$service->created_at->diffForHumans()}}</td>
                                    <td><a href="/service/{{$service->id}}" class="btn btn-outline-success">View</a></td>
                                    <td><a href="/admin/service/{{$service->id}}/edit/" class="btn btn-outline-warning">Edit</a></td>
                                    <td>
                                        <form method="post" action="{{ route('admin.service.destroy', $service->id) }}" autocomplete="off">
                                            @csrf
                                            @method('DELETE')
                                            @if($service->deleted_at == null)
                                                <input type="hidden" name="deleted_at" value="{{now()}}">
                                                <button class="btn btn-outline-danger">Delete</button>
                                            @endif
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot class="thead-light">
                            <tr>
                                <th scope="col">Tanker</th>
                                <th scope="col">Harvest</th>
                                <th scope="col">Updated Date</th>
                                <th scope="col">Created Date</th>
                                <th scope="col">View</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>

                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            {{$services->links()}}
                        </nav>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
