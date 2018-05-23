@extends('layouts._admin')

@section('admin_panel')

@include('partials._page-title', ['title' => 'Images', 'subtitle' => 'Manage your images'])

<div class="row">
    @foreach($images as $image)

        <div class="col-sm-6 col-12 mb-4">
            @include('partials._image-card')
        </div>

    @endforeach
</div>

<div class="row mt-3 justify-content-center">
    {{ $images->links() }}
</div>
@endsection
