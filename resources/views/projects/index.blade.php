@extends('layouts.app')

@section('content')
<div class="container">

    @include('partials.titles._page-title', ['title' => 'Portfolio', 'subtitle' => 'Projects showcase'])

    @if($projects->count() > 0)

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

    @else

        <div class="row justify-content-center">
            <div class="col-md-6">

                @include('partials.cards._notification-card', [
                    'title' => 'Sorry',
                    'content' => 'There are no projects yet. Please check back soon!'
                ])
                
            </div>
        </div>

    @endif
</div>
@endsection
