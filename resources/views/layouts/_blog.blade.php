@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @include('partials._page-title', ['title' => 'Categories', 'subtitle' => 'Select your favourite category'])

            <div class="row mb-4">
                <div class="col">
                    @include('forms._search-bar', ['model' => 'post'] )
                </div>
            </div>

            <div class="row">

                @foreach($categories as $category)

                    <div class="col-md-4">
                        @include('partials._category-card')
                    </div>

                @endforeach

            </div>
        </div>
    </div>
</div>
@endsection
