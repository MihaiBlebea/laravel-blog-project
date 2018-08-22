@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @include('partials.titles._page-title', [
                'title'    => $user->first_name . ' ' . $user->last_name,
                'subtitle' => $user->email
            ])

            <div class="row">
                <img class="profile-img mr-3" src="{{ asset($user->profile->image->path ?? 'images/profile-placeholder.jpg') }}">
                <div class="col">
                    <strong>{{ $user->profile->short_description }}</strong>
                    <div class="mt-3">
                        @toHtml($user->profile->description)
                    </div>
                </div>
            </div>
            <hr class="mb-4">


            <!-- Projects section -->
            @if($user->hasProjects())
                @include('partials.titles._page-subtitle', ['title' => 'Some of my biggest personal projects'])

                <div class="row">
                    <div class="col">
                        @foreach($projects as $lang => $items)
                            <h4>{{ $lang }}</h4>
                            <hr>
                            <div class="mb-5">
                                @foreach($items as $index => $project)
                                    <a href="{{ route('project.get', ['project' => $project->slug ]) }}">
                                        <p>
                                            <strong>{{ $index + 1 }}. {{ $project->name }}</strong>
                                            <span class="float-right">Read more</span>
                                        </p>
                                    </a>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
            <!-- Projects section -->


            <!-- Content section -->
            @if($user->hasPosts())
                @include('partials.titles._page-subtitle', ['title' => 'Checkout my awesome posts'])

                <div class="row">
                    @foreach($posts as $post)
                        <div class="col-md-4 mb-3">
                            @include('partials.cards._post-card-small')
                        </div>
                    @endforeach
                </div>
            @endif
            <!-- Content section -->


            <!-- Contact section -->
            @include('partials.titles._page-subtitle', ['title' => 'Contact me'])

            <div class="row justify-content-center">
                <div class="col-md-8">

                    @include('forms._contact-form')

                </div>
            </div>
            <!-- Contact section -->

        </div>
    </div>

</div>
@endsection
