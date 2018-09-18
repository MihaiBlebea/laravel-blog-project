@extends('layouts._admin')

@section('admin_panel')

@include('partials.titles._page-title', ['title' => 'Jobs', 'subtitle' => 'Career timeline'])

<a href="{{ route('job.store') }}" class="btn btn-primary mb-4">Add new job</a>

@include('partials.timeline._career-timeline', [
    'jobs'     => $jobs,
    'editable' => true
])

@endsection
