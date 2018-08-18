@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @include('partials.titles._page-title', ['title' => 'Results', 'subtitle' => 'We found ' . $results->count() . ' results'])

            @foreach($results as $post)

                <div class="mb-3">
                    @include('partials.cards._post-card')
                </div>

            @endforeach


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
