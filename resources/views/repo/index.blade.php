@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @include('partials._page-title', ['title' => auth()->user()->first_name . ' ' . auth()->user()->last_name . '\' projects'])

            <div class="row mb-4">
                <div class="col">
                    @include('forms._search-bar', ['model' => 'repo'] )
                </div>
            </div>

            @foreach($repos as $index => $repo)

                <div class="mb-3">
                    @include('partials._repo-card')
                </div>

            @endforeach

        </div>
    </div>
</div>
@endsection
