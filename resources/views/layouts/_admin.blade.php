@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">

            <div class="profile-image-wrapper mx-auto d-block mb-2" style="background-image: url({{ asset($user->profile->image->path ?? 'images/profile-placeholder.jpg') }});"></div>
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
