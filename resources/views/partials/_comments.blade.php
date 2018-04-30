<h3 class="mb-3 text-center">Let me know what you think about this</h3>

@foreach($post->comments->where('parent_id', null) as $index => $comment)

    <div class="mb-2">
        @include('partials._comment-card')
    </div>

    @foreach($post->comments->where('parent_id', $comment->id) as $comment)

        <div class="pl-5 mb-2">
            @include('partials._comment-card')
        </div>

    @endforeach

    @if($loop->last == false)
        <hr>
    @endif

@endforeach
