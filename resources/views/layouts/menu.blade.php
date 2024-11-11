@if (auth()->user()->isAdmin())
    @include('layouts.menu-admin')
@else
    @include('layouts.menu-client')
@endif