@extends('layouts._admin')

@section('admin_panel')

    @include('partials.titles._page-title', ['title' => 'New cateogry'])

    <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        @include('forms._create-category-form')

    </form>
@endsection
