<div class="card">
    <a href="{{ route('blog.category', [ 'category' => $category->slug ]) }}">
        <img class="card-img-top" src="{{ public_upload_path($category->cover_image) }}" alt="cover image">
    </a>
    <div class="card-body">
        <h5 class="card-title">{{ $category->name }}</h5>
        <p class="card-text">{{ $category->shortDescription() }}</p>
    </div>
</div>
