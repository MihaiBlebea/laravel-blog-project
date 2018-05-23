<div class="card">
    <a href="{{ route('blog.category', [ 'category' => $category->slug ]) }}">
        <div class="card-body p-0 bg" style="background-image: url({{ asset('storage/' . $category->image->path) }})"></div>
        <h3 class="card-title">{{ $category->name }}</h3>
    </a>
</div>
