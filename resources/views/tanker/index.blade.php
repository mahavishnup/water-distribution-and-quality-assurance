@extends('layouts.app')
@section('title', 'All Tanker')

@section('content')
    @include('profile.partials.header')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Tanker</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('tanker.index') }}" class="btn btn-sm btn-primary">Tanker</a>
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
                                <th scope="col">User</th>
                                <th scope="col">Count</th>
                                <th scope="col">Price</th>
                                <th scope="col">Updated Date</th>
                                <th scope="col">Created Date</th>
                                <th scope="col">Status</th>
                                <th scope="col">Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tankers as $tanker)
                                <tr>
                                    <td>{{\App\Models\User::where(['id' => $tanker->user_id])->pluck('name')->first()}}</td>
                                    <td>{!! Str::limit($tanker->count, 20) !!}</td>
                                    <td>{!! Str::limit($tanker->price, 20) !!}</td>
                                    <td>{{$tanker->updated_at->diffForHumans()}}</td>
                                    <td>{{$tanker->created_at->diffForHumans()}}</td>
                                    <td>
                                        @if($tanker->status == 1)
                                            <a href="#" class="btn btn-outline-success">Done</a>
                                        @endif
                                        @if($tanker->status == 0)
                                            <a href="#" class="btn btn-outline-warning">Pending</a>
                                        @endif
                                    </td>
                                    <td>
                                        <form method="post" action="{{ route('tanker.destroy', $tanker->id) }}" autocomplete="off">
                                            @csrf
                                            @method('DELETE')
                                            @if($tanker->deleted_at == null)
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
                                <th scope="col">User</th>
                                <th scope="col">Count</th>
                                <th scope="col">Price</th>
                                <th scope="col">Updated Date</th>
                                <th scope="col">Created Date</th>
                                <th scope="col">Status</th>
                                <th scope="col">Delete</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>

                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            {{$tankers->links()}}
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
