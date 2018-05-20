@extends('layouts._admin')

@section('admin_panel')

    @include('partials._page-title', ['title' => 'Update post'])

    <form action="{{ route('post.update', [ 'post' => $post->slug ]) }}" method="POST" enctype="multipart/form-data">
        @csrf

        @include('forms._create-post-form')

    </form>
@endsection
