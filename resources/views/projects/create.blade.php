@extends('layouts._admin')

@section('admin_panel')

    @include('partials.titles._page-title', ['title' => 'Project'])

    <form action="{{ route('project.store') }}" method="POST">
        @csrf

        @include('forms._create-project-form')

        <div class="mt-5">
            @include('partials._form-button', ['cta' => 'Save'])
        </div>
        
    </form>
@endsection
