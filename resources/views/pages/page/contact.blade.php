@extends('layouts.app')

@section('content')

@include('partials.titles._page-title', ['title' => 'Contact', 'subtitle' => 'Let\'s get the conversation rollin'])

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @include('forms._contact-form')

        </div>
    </div>
</div>
@endsection
