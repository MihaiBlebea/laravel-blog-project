@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @include('partials._breadcrumbs')

            @if($posts->count() > 0)

                @foreach($posts as $post)

                    <div class="mb-3">
                        @include('partials._post-card')
                    </div>

                @endforeach

            @else

                @include('partials._notification-card', [
                    'title' => 'Sorry!',
                    'content' => 'There are no published posts in this category, yet. Come back later!'
                ])

            @endif

        </div>
    </div>
</div>
@endsection
