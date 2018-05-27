@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @include('partials.titles._page-title', ['title' => '404 Error'])

            <div class="card">
                <div class="card-body">
                    <p>Sorry, the page you requested could not be found. Please try another one.</p>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
