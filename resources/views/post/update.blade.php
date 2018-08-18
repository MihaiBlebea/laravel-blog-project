@extends('layouts._admin')

@section('admin_panel')

    @include('partials.titles._page-title', ['title' => 'Update post'])

    <form action="{{ route('post.update', [ 'post' => $post->slug ]) }}" method="POST">
        @csrf

        @include('forms._create-post-form')

    </form>
@endsection
