@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <!-- Display different title based on if category or user models are set -->
            @if(isset($category))

                @include('partials.titles._page-title', ['title' => $category->name, 'subtitle' => 'Read all about ' . $category->name])

                <!-- Display navigation for selecting categories -->
                <div class="mb-5">
                    @include('partials.navigations._category-nav')
                </div>

                <!-- Display description card for category -->
                <div class="mb-5">
                    @include('partials.cards._category-description-card')
                </div>

            @elseif(isset($user))

                @include('partials.titles._page-title', ['title' => $user->first_name . ' ' . $user->last_name . '\'s posts'])

                <!-- Display user small description card -->
                <div class="mb-5">
                    @include('partials.cards._user-card-small')
                </div>

            @else

                @include('partials.titles._page-title', ['title' => 'Posts', 'subtitle' => 'your dev library'])

                <!-- Display navigation for selecting categories -->
                <div class="mb-5">
                    @include('partials.navigations._category-nav')
                </div>

            @endif
            <!-- Display different title based on if category or user models are set -->

            @if($posts->count() > 0)

                @foreach($posts as $post)

                    @if($loop->index == 1)

                        <div class="mb-4 animated fadeIn delay-1">
                            @include('partials.cards._lead-in-content-card')
                        </div>

                    @endif

                    <div class="mb-4 animated fadeIn delay-1">
                        @include('partials.cards._post-card')
                    </div>

                @endforeach

            @else

                <div class="row justify-content-center">
                    <div class="col-md-6">

                        @include('partials.cards._notification-card', [
                            'title' => 'Sorry!',
                            'content' => 'There are no published posts in this category, yet. Come back later!'
                        ])
                        
                    </div>
                </div>

            @endif

        </div>
    </div>

    <div class="row mt-3 justify-content-center">
        {{ $posts->links() }}
    </div>

</div>
@endsection
