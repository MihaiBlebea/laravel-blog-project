<div class="card">
    <a href="{{ route('blog.category', [ 'category' => $category->slug ]) }}">
        <div class="image--bg image--bg__medium w-100"
             style="background-image: url('{{ asset($category->image->path ?? 'images/post-placeholder.png') }}');">
        </div>

        <h3 class="card__title card__title--white p-2 mb-0">
            {{ $category->name }}
        </h3>
    </a>
</div>
