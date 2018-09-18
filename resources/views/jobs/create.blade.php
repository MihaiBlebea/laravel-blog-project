@extends('layouts._admin')

@section('admin_panel')

    @include('partials.titles._page-title', ['title' => 'Create new job', 'subtitle' => 'add a new entry'])

    <form action="{{ route('job.store') }}" method="POST">
        @csrf

        @include('forms._create-job-form')

        <div class="mt-5">
            @include('partials._form-button', [
                'cta' => 'Save',
            ])
        </div>
        
    </form>
@endsection
