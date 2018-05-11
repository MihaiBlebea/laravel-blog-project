@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @if(isset($category))

                @include('partials._page-title', ['title' => $category->name, 'subtitle' => 'Read all about ' . $category->name])

                @include('partials._breadcrumbs')

            @else

                @include('partials._page-title', ['title' => $user->first_name . ' ' . $user->last_name . '\'s posts'])

            @endif

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
