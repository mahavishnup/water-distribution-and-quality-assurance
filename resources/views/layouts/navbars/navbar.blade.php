@guest()
    @include('layouts.navbars.navs.guest')
@endguest
@if(@\App\Models\User::find(Auth::user()->id)->is_admin == '0')
    @include('layouts.navbars.navs.auth')
@endif
@if(@\App\Models\User::find(Auth::user()->id)->is_admin == '1')
    @include('layouts.navbars.navs.admin')
@endif
