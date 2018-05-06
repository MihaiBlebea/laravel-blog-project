@extends('layouts._profile')

@section('profile_content')

    @include('partials._page-title', ['title' => 'New cateogry'])

    <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        @include('forms._create-category-form')

    </form>
@endsection
