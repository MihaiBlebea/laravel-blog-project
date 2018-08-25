@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">

            <div class="image--bg image--bg__medium w-100 mb-2" style="background-image: url({{ Gravatar::src(auth()->user()->email, 640) }});"></div>
            <div class="text-center">
                <strong>{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</strong>
            </div>
            <hr>
            @include('partials.navigations._sidebar-nav')

        </div>

        <div class="col-md-9">

            @yield('admin_panel')

        </div>
    </div>
</div>
@endsection
