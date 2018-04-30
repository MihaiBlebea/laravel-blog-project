@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            @include('partials._breadcrumbs')

            @foreach($posts as $post)

                @include('partials._post-card')

            @endforeach
        </div>
    </div>
</div>
@endsection
