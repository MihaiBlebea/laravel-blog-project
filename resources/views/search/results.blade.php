@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @foreach($results as $result)

                <div class="mb-3">
                    @include('partials._result-card')
                </div>

            @endforeach

        </div>
    </div>
</div>
@endsection
