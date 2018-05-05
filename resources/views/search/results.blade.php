@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @search('post')

                <div class="row mb-4">
                    <div class="col">
                        @include('forms._search-bar', ['model' => 'post'] )
                    </div>
                </div>

                @foreach($posts as $post)

                    <div class="mb-3">
                        @include('partials._post-card')
                    </div>

                @endforeach
            @endsearch

            @search('user')

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
            @endsearch


        </div>
    </div>
</div>
@endsection
