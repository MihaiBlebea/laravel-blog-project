<h3 class="mb-3 text-center">Let me know what you think about this</h3>

<div class="card mb-3">
    <div class="card-body">
        <form action="{{ route('comment.store') }}" method="POST">
            @csrf

            @include('forms._comment-reply-form')
        </form>
    </div>
</div>

@if($post->comments->count() > 0)

    @foreach($post->comments->where('parent_id', null) as $index => $comment)

        <div class="mb-3">
            @include('partials._comment-card')
        </div>

        <div class="comment-border">
            @foreach($post->comments->where('parent_id', $comment->id) as $comment)

                <div class="mb-3">
                    @include('partials._comment-card')
                </div>

            @endforeach
        </div>

        @if($loop->last == false)
            <hr>
        @endif

    @endforeach

@else

    @include('partials._notification-card', [
        'title' => 'No comments yet...',
        'content' => 'Be the first one to comment on this post!'
    ])

@endif
