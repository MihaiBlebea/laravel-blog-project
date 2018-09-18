@extends('layouts._admin')

@section('admin_panel')

    @include('partials.titles._page-title', [
        'title' => 'Update job',
        'subtitle' => $job->position . ' @ ' . $job->company_name
    ])

    <form action="{{ route('job.update', [ 'job' => $job->id ]) }}" method="POST">
        @csrf

        @include('forms._create-job-form')

        <div class="mt-5">
            @include('partials._form-button', [
                'cta' => 'Update',
            ])
        </div>

    </form>
@endsection
