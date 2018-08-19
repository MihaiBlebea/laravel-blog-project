<div class="row">
    <img class="profile-image-wrapper mr-2 ml-3" src="{{ asset($category->image->path ?? 'images/profile-placeholder.jpg') }}">
    <div class="col">
        <strong>{{ $category->name }}</strong>
        <p>{{ $category->description }}</p>
    </div>
</div>
<hr>
