@extends('layouts.app')

@section('content')
<!-- Main hero section -->
<div class="section bg-primary image__background-main"
     style="margin-top: -24px; background-image: url('{{ asset('images/MihaiBlebea.png') }}')">
    <div class="container">
        <div class="jumbotron">

            <div class="row">
                <div class="col-12 col-md-6">
                    <h1 class="text-capitalize text-white text-center">Ever been stuck on some piece of code with no solution in sight?</h1>
                    <h4 class="text-lowercase text-white text-center">find all the documentation to become the best developer</h4>
                    <div class="text-center mt-4">
                        <a href="{{ route('page.get', [ 'page' => 'about' ]) }}"
                           class="btn btn-light btn-lg text-capitalize">Find out more</a>
                    </div>
                </div>

                {{-- <div class="col-6">
                    <img style="width: 100%; opacity: 0.3;" src="{{ asset('images/MihaiBlebea.png') }}">
                </div> --}}
            </div>
        </div>
    </div>
</div>
<!-- Main hero section -->


<!-- Latest articles section -->
<div class="section">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col">
                @include('partials.titles._page-subtitle', ['title' => 'Latest articles'])

                @include('partials._related-posts', [ 'related_posts' => $posts ])
            </div>
        </div>
    </div>
</div>
<!-- Latest articles section -->


<!-- About me section -->
<div class="section bg-white">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                @include('partials.titles._page-subtitle', ['title' => 'About me'])
                <div class="row">
                    <div class="col">
                        <p class="lead text-center">{{ $user->profile->short_description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About me section -->


<!-- Include the career timeline -->
<div class="section">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">

                <div class="my-5">
                    @include('partials.timeline._career-timeline', [
                        'jobs'     => $jobs->take(3),
                        'editable' => false
                    ])
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
<!-- Include the career timeline -->

<hr />

<!-- Contact form section -->
<div class="section">
    <div class="container">

        @include('partials.titles._page-subtitle', ['title' => 'Contact'])
        <div class="row justify-content-center">
            <div class="col-md-8">

                @include('forms._contact-form')

            </div>
        </div>
    </div>
</div>
<!-- Contact form section -->

@endsection
