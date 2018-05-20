@extends('layouts.app')

@section('content')

@include('partials._social-buttons', ['position' => 'vertical'])

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-12">

            @include('partials._profile-short-description', ['user' => $post->author])

            <h1 class="mb-5 mt-5 text-center">{{ $post->title }}</h1>

            <div class="bg-img" style="background-image: url('{{ public_upload_path($post->feature_image) }}');"></div>

            @include('partials._breadcrumbs')

            <div class="mb-5">

                <p class="card-text font-article">{!! $post->content !!}</p>

            </div>

            @include('partials._comments')

        </div>
    </div>
</div>

@endsection
