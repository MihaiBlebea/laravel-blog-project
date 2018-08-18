@extends('layouts._admin')

@section('admin_panel')

    @include('partials.titles._page-title', ['title' => 'New post', 'subtitle' => 'show your skills'])

    <form action="{{ route('post.store') }}" method="POST">
        @csrf

        @include('forms._create-post-form')

    </form>
@endsection
