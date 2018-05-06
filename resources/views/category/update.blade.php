@extends('layouts._profile')

@section('profile_content')

    @include('partials._page-title', ['title' => 'Update category', 'subtitle' => $category->name])

    <form action="{{ route('category.update', ['category' => $category->slug]) }}" method="POST" enctype="multipart/form-data">
        @csrf

        @include('forms._create-category-form')

    </form>
@endsection
