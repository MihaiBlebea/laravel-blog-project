@extends('layouts.app')

@section('content')
<div class="container">

    @include('partials.titles._page-title', ['title' => $project->name])

    <div class="row justify-content-center">
        <div class="col-md-8">

            @include('partials._profile-short-description', ['user' => $project->user])

            <p class="font-article">
                <strong>{{ $project->short_description }}</strong>
            </p>
        </div>
    </div>

    @if($project->hasGallery())
        <div class="mb-5 mt-5">
            <masonry-wrapper project-slug="{{ $project->slug ?? null }}"></masonry-wrapper>
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="font-article">{!! $project->description !!}</div>

            <div class="mt-5">
                @include('partials._profile-short-description', ['user' => $project->user])
            </div>
        </div>
    </div>

    <div class="row mt-5 justify-content-center">
        @foreach($projects as $project)

            <div class="col-md-4 mb-4 animated fadeIn delay-1">
                @include('partials.cards._project-card')
            </div>

        @endforeach
    </div>

</div>
@endsection
