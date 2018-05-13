@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @include('partials._page-title', ['title' => '403 Error'])

            <div class="card">
                <div class="card-body">
                    <p>You do not have permission to view this page</p>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
