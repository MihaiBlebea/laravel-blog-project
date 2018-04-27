@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">

            @include('partials._admin-navigation')
            
        </div>

        <div class="col-md-9">

            @yield('admin_panel')

        </div>
    </div>
</div>
@endsection
