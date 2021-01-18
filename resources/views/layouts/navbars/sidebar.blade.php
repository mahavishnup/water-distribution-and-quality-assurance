@if(\App\Models\User::find(Auth::user()->id)->is_admin == '0')
    @include('layouts.navbars.sidebar.auth')
@endif
@if(\App\Models\User::find(Auth::user()->id)->is_admin == '1')
    @include('layouts.navbars.sidebar.admin')
@endif
