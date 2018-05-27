@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @include('partials.titles._page-title', ['title' => $project->name])

            <div class="row">
                @foreach($project->images as $image)

                    <div class="col-md-4">
                        <img class="profile-img lg"
                             src="{{ asset($image->path ?? 'images/profile-placeholder.jpg') }}">
                    </div>

                @endforeach
            </div>

            <div class="card">
                <div class="card-body p-4 p-md-5">
                    {{ $project->short_description }}
                    <hr>
                    {!! $project->description !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
