@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="jumbotron p-5">
                @include('partials._page-title', [
                    'title' => 'Ever been stuck on some piece of code with no solution in sight?',
                    'subtitle' => '...the solution is just 2 clicks away'
                ])
            </div>

        </div>
    </div>

    <h2 class="text-center">Read the latest posts</h2>
    <hr>
    <div class="row">
        @foreach($posts as $post)

            <div class="col-md-4 mb-4">
                @include('partials._post-card')
            </div>

        @endforeach
    </div>

</div>
@endsection
