<div class="card">
    <a href="{{ route('blog.post', [ 'category' => $post->category->slug, 'post' => $post->slug ]) }}">
       <img class="card-img-top feature-image-post-card" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQeGYabOnW8fIZNTjACJfzgS82zLD92t7jZhYnILf7yRjgcFI6a" alt="Card image cap">
    </a>
    <div class="card-body">
        <h5 class="card-title">{{ $post->title }}</h5>
        <p class="card-text">{{ $post->except() }}</p>
        <a href="{{ route('blog.post', [ 'category' => $post->category->slug, 'post' => $post->slug ]) }}"
           class="btn btn-primary">Read article</a>
    </div>
    <div class="card-footer">
        <small class="text-muted float-left">{{ $post->author->first_name }} {{ $post->author->last_name }}. on {{ $post->created_at->toDateString() }}</small>
        <small class="text-muted float-right">{{ $post->comments->count() }} comments</small>
    </div>
</div>
