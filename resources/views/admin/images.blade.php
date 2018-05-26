@extends('layouts._admin')

@section('admin_panel')

@include('partials._page-title', ['title' => 'Images', 'subtitle' => 'Manage your images'])

<image-grid user="{{ auth()->user()->slug }}"></image-grid>

@endsection
