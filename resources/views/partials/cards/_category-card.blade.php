<div class="card">
    <a href="{{ route('blog.category', [ 'category' => $category->slug ]) }}"
       style="position:relative;">
        <img style="max-width:100%" src="{{ asset($category->image->path ?? 'images/post-placeholder.png') }}">
        <h3 class="card-title card-title--overlay card-title--overlay__white p-2 mb-0">
            {{ $category->name }}
        </h3>
    </a>
</div>
