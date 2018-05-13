@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @include('partials._page-title', ['title' => 'Categories', 'subtitle' => 'Select your favourite category'])

            <div class="row">

                @foreach($categories as $category)

                    <div class="col-md-6 mb-3 animated fadeIn delay-1">
                        @include('partials._category-card')
                    </div>

                @endforeach

            </div>
        </div>
    </div>
</div>
@endsection
