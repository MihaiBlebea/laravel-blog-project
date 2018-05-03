@extends('layouts.app')

@section('content')
<div class="featured-image" style="background-image: url('{{ $post->feature_image }}');"></div>
<div class="container post-content">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-5">
                <div class="card-body">

                    @include('partials._breadcrumbs')

                    <h1 class="mb-5 mt-5 text-center">{{ $post->title }}</h1>

                    <p class="card-text">{!! $post->content !!}</p>
                </div>
            </div>

            @include('partials._comments')

        </div>
    </div>
</div>

@endsection
