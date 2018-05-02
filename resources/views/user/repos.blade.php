@extends('layouts._profile')

@section('profile_content')
    <h1 class="mb-5">{{ $user->first_name }} {{ $user->last_name }}'s repos</h1>

    @foreach($repos as $index => $repo)

        @include('partials._repo-card')

    @endforeach

@endsection
