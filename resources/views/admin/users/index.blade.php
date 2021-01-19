@extends('layouts.app')
@section('title', 'Users Details')

@section('content')
    @include('admin.profile.partials.header')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Users</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('admin.users.create') }}" class="btn btn-sm btn-primary">Add user</a>
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
                                <th scope="col">Name</th>
                                <th scope="col">Image</th>
                                <th scope="col">Email</th>
                                <th scope="col">Updated Date</th>
                                <th scope="col">Created Date</th>
                                <th scope="col">Role</th>
                                <th scope="col">Status</th>
                                <th scope="col">Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>
                                        @if(\App\Models\User::find($user->id)->photo->url == '1')
                                            <img src="{{\App\Models\User::find($user->id)->photo->file}}" alt="{{$user->name}}" height="75">
                                        @endif
                                        @if(\App\Models\User::find($user->id)->photo->url == '0')
                                            <img src="/images/uploads/{{\App\Models\User::find($user->id)->photo->file}}" alt="{{$user->name}}" height="75">
                                        @endif
                                    </td>
                                    <td>
                                        <a href="mailto:{{$user->email}}">{{$user->email}}</a>
                                    </td>
                                    <td>{{$user->updated_at->diffForHumans()}}</td>
                                    <td>{{$user->created_at->diffForHumans()}}</td>
                                    <td>
                                        <form method="get" action="{{ route('admin.users.edit', $user->id) }}" autocomplete="off">
                                            @csrf
                                            @if($user->is_admin == 1)
                                                <input type="hidden" name="status" value="0">
                                                <button class="btn btn-outline-success">Admin</button>
                                            @endif
                                            @if($user->is_admin !== 1)
                                                <input type="hidden" name="status" value="1">
                                                <button class="btn btn-outline-success">User</button>
                                            @endif
                                        </form>
                                    </td>
                                    <td>
                                        <form method="post" action="{{ route('admin.users.update', $user->id) }}" autocomplete="off">
                                            @csrf
                                            @method('put')
                                            @if($user->is_active !== 1)
                                                <input type="hidden" name="status" value="1">
                                                <button class="btn btn-outline-warning">Passive</button>
                                            @endif
                                            @if($user->is_active == 1)
                                                <input type="hidden" name="status" value="0">
                                                <button class="btn btn-outline-info">Active</button>
                                            @endif
                                        </form>
                                    </td>
                                    <td>
                                        <form method="post" action="{{ route('admin.users.destroy', $user->id) }}" autocomplete="off">
                                            @csrf
                                            @method('DELETE')
                                            @if($user->deleted_at == null)
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
                                <th scope="col">Name</th>
                                <th scope="col">Image</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col">Status</th>
                                <th scope="col">Updated Date</th>
                                <th scope="col">Created Date</th>
                                <th scope="col">Delete</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>

                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            {{$users->links()}}
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
