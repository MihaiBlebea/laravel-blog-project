@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @include('partials._page-title', ['title' => 'developers', 'subtitle' => 'Manage subscriptions'])

            @foreach($users as $user)
                <div class="mb-3 animated fadeIn delay-1">
                    @include('partials._user-card')
                </div>
            @endforeach

            <div class="row mt-3 justify-content-center">
                {{ $users->links() }}
            </div>

        </div>
    </div>
</div>
@endsection
