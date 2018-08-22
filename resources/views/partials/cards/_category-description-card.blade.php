<div class="row">
    {{-- <img class="profile-image-wrapper mr-2 ml-3" src="{{ asset($category->image->path ?? 'images/profile-placeholder.jpg') }}"> --}}
    <div class="col-md-4 col-12 mb-3">
        @include('partials._image-responsive', ['image_path' => $category->image->path])
    </div>

    <div class="col">
        <strong>{{ $category->name }}</strong>
        <p>{{ $category->description }}</p>
    </div>
</div>
<hr>
