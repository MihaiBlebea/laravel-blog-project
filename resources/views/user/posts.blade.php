@extends('layouts._profile')

@section('profile_content')

    @include('partials._page-title', ['title' => 'Manage your posts'])

    @foreach($posts as $post)

        <div class="mb-3">
            @include('partials._mini-post-card')
        </div>

    @endforeach

@endsection
