@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @include('partials._page-title', ['title' => $user->first_name . ' ' . $user->last_name . '\' posts'])

            <div class="row mb-4">
                <div class="col">
                    @include('forms._search-bar', ['model' => 'user'] )
                </div>
            </div>

            @foreach($posts as $post)

                <div class="mb-3">
                    @include('partials._post-card')
                </div>

            @endforeach

        </div>
    </div>
</div>
@endsection
