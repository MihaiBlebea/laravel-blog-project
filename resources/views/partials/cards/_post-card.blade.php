<div class="card">
    <a href="{{ route('blog.post', [ 'category' => $post->category->slug, 'post' => $post->slug ]) }}"
       style="position:relative;">
        <img style="max-width:100%" src="{{ asset($post->image->path ?? 'images/post-placeholder.png') }}">
        <div class="img-overlay"></div>
    </a>
    <div class="card-body">
        <h2 class="card-title">{{ $post->title }}</h2>
        <p class="card-text">{!! $post->except() !!}</p>
        <a href="{{ route('blog.post', [ 'category' => $post->category->slug, 'post' => $post->slug ]) }}"
           class="btn btn-primary">Read article</a>
    </div>
    <div class="card-footer">
        <small class="text-muted float-left">{{ $post->author->first_name }} {{ $post->author->last_name }}. on {{ $post->created_at->toDateString() }}</small>
        <small class="text-muted float-right">{{ $post->comments->count() }} comments</small>
    </div>
</div>
