@extends('layouts._profile')

@section('profile_content')
    <h1 class="mb-5">{{ $user->first_name }} {{ $user->last_name }}'s posts</h1>

    @foreach($posts as $post)

        <div class="mb-3">
            @include('partials._mini-post-card')
        </div>
        
    @endforeach

@endsection
