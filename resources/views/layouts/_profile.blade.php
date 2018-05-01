@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">

            <img class="img-thumbnail mb-3" src="{{ $user->profile_image }}">
            @include('partials._sidebar-navigation')

        </div>

        <div class="col-md-9">

            @yield('profile_content')

        </div>
    </div>
</div>
@endsection
