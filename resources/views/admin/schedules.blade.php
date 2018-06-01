@extends('layouts._admin')

@section('admin_panel')

@include('partials.titles._page-title', ['title' => 'Schedule'])

<div class="card">
    <div class="card-body">
        <vue-schedule user-id="{{ auth()->user()->slug }}"></vue-schedule>
    </div>
</div>

@endsection
