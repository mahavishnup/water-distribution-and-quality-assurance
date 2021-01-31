@extends('layouts.app')
@section('title', 'Recent Track')

@section('content')
    @include('profile.partials.header')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Recent Track</h3>
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
                                <th scope="col">Current</th>
                                <th scope="col">To</th>
                                <th scope="col">Updated Date</th>
                                <th scope="col">Created Date</th>
                                <th scope="col">Status</th>
                                <th scope="col">Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tracks as $track)
                                <tr>
                                    <td>{{\App\Models\User::where(['id' => $track->user_id])->pluck('name')->first()}}</td>
                                    <td>{!! Str::limit($track->current, 20) !!}</td>
                                    <td>{!! Str::limit($track->to, 20) !!}</td>
                                    <td>{{$track->updated_at->diffForHumans()}}</td>
                                    <td>{{$track->created_at->diffForHumans()}}</td>
                                    <td>
                                        @if($track->status == 1)
                                            <a href="#" class="btn btn-outline-success">Done</a>
                                        @endif
                                        @if($track->status == 0)
                                            <a href="#" class="btn btn-outline-warning">Pending</a>
                                        @endif
                                    </td>
                                    <td>
                                        <form method="post" action="{{ route('track.destroy', $track->id) }}" autocomplete="off">
                                            @csrf
                                            @method('DELETE')
                                            @if($track->deleted_at == null)
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
                                <th scope="col">Current</th>
                                <th scope="col">to</th>
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
                            {{$tracks->links()}}
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
