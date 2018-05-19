@extends('layouts._admin')

@section('admin_panel')

    @include('partials._page-title', ['title' => 'Project'])

    <form action="{{ route('project.update', [ 'project' => $project->slug ]) }}" method="POST" enctype="multipart/form-data">
        @csrf

        @include('forms._create-project-form')

    </form>
@endsection
