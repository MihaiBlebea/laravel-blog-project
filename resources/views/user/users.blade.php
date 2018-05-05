@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @include('partials._page-title', ['title' => 'developers', 'subtitle' => 'Manage subscriptions'])

            <div class="row mb-4">
                <div class="col">
                    @include('forms._search-bar', ['model' => 'user'] )
                </div>
            </div>

            @foreach($users as $user)
                <div class="mb-3">
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
