@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @include('partials._page-title', ['title' => 'Results', 'subtitle' => 'We found ' . $results->count() . ' results'])

            @search('post')

                <div class="row mb-4">
                    <div class="col">
                        @include('forms._search-bar', ['model' => 'post'] )
                    </div>
                </div>

                @foreach($results as $post)

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

                @foreach($results as $user)

                    <div class="mb-3">
                        @include('partials._user-card')
                    </div>

                @endforeach
            @endsearch


            @if($results->count() == 0)

                @include('partials._notification-card', [
                    'title' => 'No results found!',
                    'content' => 'We are sorry, but your search for <strong>"' . $search_term . '"</strong> did not yield any results.'
                ])

            @endif

        </div>
    </div>
</div>
@endsection
