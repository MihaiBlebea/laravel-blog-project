@extends('layouts.app')

@section('content')

{{-- @include('partials._social-buttons', ['position' => 'vertical']) --}}

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-12">

            @include('partials.cards._user-card-small', ['user' => $post->author])

            <h1 class="mb-5 mt-5 text-center">{{ $post->title }}</h1>

            <img class="w-100" src="{{ asset($post->image->path ?? 'images/post-placeholder.png') }}">
            @include('partials._breadcrumbs')

            <div class="my-5 text__article--big">

                <!-- include intro section -->
                @if(isset($post->intro))
                    <p class="card-text"><strong>{{ $post->intro }}</strong></p>
                @endif
                <!-- include intro section -->

                <!-- include main content section -->
                <p class="card-text">
                    @toHtml($post->content)
                </p>
                <!-- include main content section -->
            </div>

            <!-- Include end author description -->
            <div class="mt-5">
                @include('partials.cards._user-card-small', ['user' => $post->author])
            </div>
            <!-- Include end author description -->

        </div>
    </div>

    <!-- include related posts -->
    <div class="row">
        <div class="col">
            <div class="mt-3">
                @include('partials._related-posts')
            </div>
        </div>
    </div>
    <!-- include related posts -->

    <!-- Include comments section -->
    <div class="row justify-content-center mt-5">
        <div class="col-md-8 col-12">
            @include('partials._comments')
        </div>
    </div>
    <!-- Include comments section -->
</div>
@endsection


{{-- @push('head')

<!-- Include meta for making the content appear in Twitter and Linkedin -->
<meta name="twitter:card" content="summary_large_image”" />
<meta name="twitter:site" content="@mihaidev" />
<meta name="twitter:creator" content="@MBlebea" />
<meta property="og:url" content="{{ $post->getUrl() }}" />
<meta property="og:title" content="{{ $post->title }}" />
<meta property="og:description" content="{{ $post->except() }}" />
<meta property="og:image" content="{{ asset($post->image->path ?? 'images/post-placeholder.png') }}" />

<!-- Include styles for code highlighting -->
<link href="{{ asset('css/highlight.css') }}" rel="stylesheet">
@endpush --}}
