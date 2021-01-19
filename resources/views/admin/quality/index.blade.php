@extends('layouts.app')
@section('title', 'All Quality Assurances')

@section('content')
    @include('admin.profile.partials.header')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Quality Assurances</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('admin.quality.create') }}" class="btn btn-sm btn-primary">Add Quality Assurances</a>
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
                                <th scope="col">Title</th>
                                <th scope="col">Body</th>
                                <th scope="col">Updated Date</th>
                                <th scope="col">Created Date</th>
                                <th scope="col">View</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($qualities as $qualitie)
                                <tr>
                                    <td>{{ Str::limit($qualitie->title, 20) }}</td>
                                    <td>{!! Str::limit($qualitie->body, 20) !!}</td>
                                    <td>{{$qualitie->updated_at->diffForHumans()}}</td>
                                    <td>{{$qualitie->created_at->diffForHumans()}}</td>
                                    <td><a href="/quality/{{$qualitie->slug}}" class="btn btn-outline-success">View</a></td>
                                    <td><a href="/admin/quality/{{$qualitie->id}}/edit/" class="btn btn-outline-warning">Edit</a></td>
                                    <td>
                                        <form method="post" action="{{ route('admin.quality.destroy', $qualitie->id) }}" autocomplete="off">
                                            @csrf
                                            @method('DELETE')
                                            @if($qualitie->deleted_at == null)
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
                                <th scope="col">Title</th>
                                <th scope="col">Body</th>
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
                            {{$qualities->links()}}
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
