@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @include('partials._page-title', ['title' => 'Projects', 'subtitle' => 'Projects showcase'])

            @foreach($projects as $project)
                <div class="mb-3 animated fadeIn delay-1">
                    @include('partials._project-card', ['project' => $project])
                </div>
            @endforeach

            <div class="row mt-3 justify-content-center">
                {{ $projects->links() }}
            </div>

        </div>
    </div>
</div>
@endsection
