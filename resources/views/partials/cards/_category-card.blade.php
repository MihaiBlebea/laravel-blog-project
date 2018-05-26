<div class="card">
    <a href="{{ route('blog.category', [ 'category' => $category->slug ]) }}">
        <img style="max-width:100%" src="{{ asset($category->image->path ?? 'images/post-placeholder.png') }}">
        <h3 class="card-title p-3 mb-0">{{ $category->name }}</h3>
    </a>
</div>
