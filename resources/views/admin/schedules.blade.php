@extends('layouts._admin')

@section('admin_panel')

@include('partials.titles._page-title', ['title' => 'Schedule'])

<vue-schedule></vue-schedule>

@endsection
