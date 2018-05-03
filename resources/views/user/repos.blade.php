@extends('layouts._profile')

@section('profile_content')
    <h1 class="mb-5">{{ $user->first_name }} {{ $user->last_name }}'s repos</h1>

    @if(Auth::user()->hasGitHub())

        @foreach($repos as $index => $repo)

            @include('partials._repo-card')

        @endforeach

    @else

        @include('partials._notification-card', [
            'title' => 'You don\'t have a GitHub account',
            'content' => 'Please link your GitHub account to your profile. <a href="">Link GitHub</a>'
        ])

    @endif

@endsection
