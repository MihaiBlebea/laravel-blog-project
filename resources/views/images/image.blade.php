@extends('layouts._admin')

@section('admin_panel')

@include('partials._page-title', ['title' => 'Images', 'subtitle' => $image->name])

<div class="row justify-content-center">
    <div class="col-md-8 col-12">
        <img class="card-img-top mb-4" src="{{ asset('storage/' . $image->path) }}" alt="Card image cap">
        <p><strong>Name:</strong> <span class="float-right">{{ $image->name }}</span></p>
        <p><strong>Uploaded:</strong> <span class="float-right">{{ $image->created_at }}</span></p>
    </div>
</div>


@endsection
