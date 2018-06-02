@extends('layouts.app')

@section('content')

@include('partials._social-buttons', ['position' => 'vertical'])
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-12">

            @include('partials._profile-short-description', ['user' => $post->author])

            <h1 class="mb-5 mt-5 text-center">{{ $post->title }}</h1>

            <img style="max-width:100%" src="{{ asset($post->image->path ?? 'images/post-placeholder.png') }}">
            @include('partials._breadcrumbs')

            <div class="mb-5">

                <!-- include intro section -->
                @if(isset($post->intro))
                    <p class="card-text font-article"><strong>{{ $post->intro }}</strong></p>
                @endif
                <!-- include intro section -->

                <!-- include main content section -->
                <p class="card-text font-article">{!! $post->content !!}</p>
                <!-- include main content section -->

                <!-- Include end author description -->
                @include('partials._profile-short-description', ['user' => $post->author])
                <!-- Include end author description -->
                
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-12">
            @include('partials._comments')
        </div>
    </div>
</div>
@endsection
