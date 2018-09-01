@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @include('partials.titles._page-title', ['title' => 'Categories', 'subtitle' => 'Select your favourite category'])

            @if($categories->count() > 0)

                <div class="row">

                    @foreach($categories as $category)

                        <div class="col-md-6 mb-3 animated fadeIn delay-1">
                            @include('partials.cards._category-card')
                        </div>

                    @endforeach

                </div>

            @else

                <div class="row justify-content-center">
                    <div class="col-md-6">

                        @include('partials.cards._notification-card', [
                            'title' => 'Sorry',
                            'content' => 'There are no categories yet. Please check back soon!'
                        ])

                    </div>
                </div>

            @endif

        </div>
    </div>
</div>
@endsection
