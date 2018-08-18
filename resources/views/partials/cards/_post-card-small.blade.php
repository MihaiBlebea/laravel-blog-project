<div class="card">
    <a href="{{ route('blog.post', [ 'category' => $post->category->slug, 'post' => $post->slug ]) }}"
       style="position:relative;">
        <img style="max-width:100%" src="{{ asset($post->image->path ?? 'images/post-placeholder.png') }}">
        <p class="card-title card-title--overlay card-title--overlay__white p-2 mb-0">
            {{ $post->title }}
        </p>
    </a>
</div>
