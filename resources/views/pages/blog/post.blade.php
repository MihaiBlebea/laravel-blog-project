@extends('layouts.app')

@section('content')

@include('partials._social-buttons', ['position' => 'vertical'])

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-12">

            @include('partials.cards._user-card-small', ['user' => $post->author])

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
                <p class="card-text font-article">
                    @toHtml($post->content)
                </p>
                <!-- include main content section -->

                <!-- Include end author description -->
                <div class="mt-5">
                    @include('partials.cards._user-card-small', ['user' => $post->author])
                </div>
                <!-- Include end author description -->

                <div class="mt-5">
                    @include('partials._related-posts')
                </div>
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


@push('head')

<meta name="twitter:card" content="summary" />
<meta name="twitter:site" content="@mihaidev" />
<meta name="twitter:creator" content="@MBlebea" />
<meta property="og:url" content="{{ $post->getUrl() }}" />
<meta property="og:title" content="{{ $post->title }}" />
<meta property="og:description" content="{{ $post->except() }}" />
<meta property="og:image" content="{{ asset($post->image->path ?? 'images/post-placeholder.png') }}" />

@endpush
