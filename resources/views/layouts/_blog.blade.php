@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
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
