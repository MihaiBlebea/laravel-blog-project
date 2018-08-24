@extends('layouts.app')

@section('content')
<!-- First section -->
<div class="section bg-primary" style="margin-top: -24px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="jumbotron p-5">

                    <div class="mt-3 mb-5 text-center">
                        <h1 class="mb-2 text-capitalize text-white">Ever been stuck on some piece of code with no solution in sight?</h1>
                        <h4 class="text-lowercase text-white">find all the documentation to become the best developer</h4>
                    </div>

                    <img style="width:100%;" src="{{ asset('images/cover.png') }}">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- First section -->


<!-- Second section -->
<div class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                @include('partials.titles._page-subtitle', ['title' => 'Choose your journey'])
                <div class="row">
                    @foreach($categories as $category)
                        @if($loop->last && isOdd($categories->count()))
                            <div class="col-md-12 mb-4 animated fadeIn delay-1">
                                <div class="row justify-content-center">
                                    <div class="col-md-6">
                                        @include('partials.cards._category-card')
                                    </div>
                                </div>
                            </div>
                        @else

                            <div class="col-md-6 mb-4 animated fadeIn delay-1">
                                @include('partials.cards._category-card')
                            </div>

                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Second section -->


<!-- Third section -->
<div class="section bg-white">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('partials.titles._page-subtitle', ['title' => 'About me'])
                <div class="row">
                    <div class="col">
                        <p class="lead text-center">{{ $user->profile->short_description }}</p>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <a href="{{ route('page.get', [ 'page' => 'about' ]) }}" class="btn btn-primary text-capitalize btn-block">
                            Find out more
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Third section -->

<!-- Third section -->
<div class="section">
    <div class="container">

        @include('partials.titles._page-subtitle', ['title' => 'Contact us'])
        <div class="row justify-content-center">
            <div class="col-md-8">

                @include('forms._contact-form')

            </div>
        </div>
    </div>
</div>
<!-- Third section -->

@endsection
