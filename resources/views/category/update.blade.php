@extends('layouts._admin')

@section('admin_panel')

    @include('partials.titles._page-title', ['title' => 'Update category', 'subtitle' => $category->name])

    <form action="{{ route('category.update', ['category' => $category->slug]) }}" method="POST" enctype="multipart/form-data">
        @csrf

        @include('forms._create-category-form')

    </form>
@endsection
