@extends('layouts._admin')

@section('admin_panel')

@include('partials.titles._page-title', ['title' => 'Schedule'])

@include('forms._create-schedule-form')

@endsection
