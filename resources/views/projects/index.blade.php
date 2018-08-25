@extends('layouts.app')

@section('content')
<div class="container">

    @include('partials.titles._page-title', ['title' => 'Portfolio', 'subtitle' => 'Projects showcase'])

    <div class="row">
        @foreach($projects as $project)

            <div class="col-md-4 mb-4 animated fadeIn delay-1">
                @include('partials.cards._project-card', [
                    'project' => $project,
                    'show_description' => true
                ])
            </div>

        @endforeach

        <div class="row mt-3 justify-content-center">
            {{ $projects->links() }}
        </div>
    </div>
</div>
@endsection
