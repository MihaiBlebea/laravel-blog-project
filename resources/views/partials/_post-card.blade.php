<div class="card">
    <a href="{{ route('blog.post', [ 'category' => $post->category->slug, 'post' => $post->slug ]) }}">
        <div class="bg" style="background-image: url('{{ public_upload_path($post->feature_image) }}');"></div>
        <!-- <h2 class="card-title">{{ $post->title }}</h2> -->
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
