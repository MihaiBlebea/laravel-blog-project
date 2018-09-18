@extends('layouts.app')

@section('content')

@include('partials.titles._page-title', ['title' => 'About us', 'subtitle' => 'Let\'s get to know each other'])

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <p class="lead">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum
            </p>

            <!-- Include the career timeline -->
            <div class="mt-5">
                @include('partials._timeline')
            </div>
            <!-- Include the career timeline -->

        </div>
    </div>
</div>

<div class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                @include('partials.titles._page-subtitle', ['title' => 'Latest articles'])

                @include('partials._related-posts')
            </div>
        </div>
    </div>
</div>

@endsection
