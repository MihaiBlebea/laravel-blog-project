@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <!-- Display different title based on if category or user models are set -->
            @if(isset($category))

                @include('partials.titles._page-title', ['title' => $category->name, 'subtitle' => 'Read all about ' . $category->name])

                @include('partials.navigations._category-nav')

            @elseif(isset($user))

                @include('partials.titles._page-title', ['title' => $user->first_name . ' ' . $user->last_name . '\'s posts'])

            @else

                @include('partials.titles._page-title', ['title' => 'Posts', 'subtitle' => 'your dev library'])

                @include('partials.navigations._category-nav')

            @endif
            <!-- Display different title based on if category or user models are set -->

            @if($posts->count() > 0)

                @foreach($posts as $post)

                    <div class="mb-4 animated fadeIn delay-1">
                        @include('partials.cards._post-card')
                    </div>

                @endforeach

            @else

                @include('partials.cards._notification-card', [
                    'title' => 'Sorry!',
                    'content' => 'There are no published posts in this category, yet. Come back later!'
                ])

            @endif

        </div>
    </div>
</div>
@endsection
