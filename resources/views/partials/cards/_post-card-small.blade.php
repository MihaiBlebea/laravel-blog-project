<div class="card">
    <a href="{{ route('blog.post', [ 'category' => $post->category->slug, 'post' => $post->slug ]) }}"
       class="position-relative">

        <img class="card__image--cover card__image--small" src="{{ asset($post->image->path ?? 'images/post-placeholder.png') }}">
        <p class="card__title card__title--white p-2 mb-0">
            <strong>{{ $post->title }}</strong>
        </p>

    </a>
</div>
