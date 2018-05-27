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
                </div>
            </div>
            <hr class="mb-4">

            <div class="row justify-content-center">
                <div class="col-md-12">
                    {!! $user->profile->description !!}
                </div>
            </div>

            <!-- Content section -->
            <h2 class="text-center mb-5 mt-5">Checkout my awesome posts</h2>
            <div class="row">
                <div class="col">
                    @foreach($posts as $post)
                        <div class="mb-3">
                            @include('partials.cards._mini-post-card')
                        </div>
                    @endforeach

                    <div class="row justify-content-between align-items-center">
                        <div class="col">
                            {{ $posts->links() }}
                        </div>
                        <div class="col">
                            <a href="{{ route('projects.index', ['user' => $user->slug]) }}">
                                <p class="text-center float-right text-primary">Checkout all my posts</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Content section -->

            <!-- Projects section -->
            <h2 class="text-center mb-5 mt-5">Some of my greatest projects</h2>
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

            <!-- Contact section -->
            <h2 class="text-center mb-5 mt-5">Contact</h2>

            <!-- Contact section -->

        </div>
    </div>

</div>
@endsection
