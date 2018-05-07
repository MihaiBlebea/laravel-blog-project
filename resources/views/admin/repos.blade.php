@extends('layouts._admin')

@section('admin_panel')

    @include('partials._page-title', ['title' => 'GitHub repos', 'subtitle' => 'Manage projects'])

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
