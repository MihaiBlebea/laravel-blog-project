<div class="card">
    <div class="card-body">
        @foreach($post->comments->where('parent_id', null) as $index => $comment)
            <div class="media">
                <div class="col-md-2 col-sm-3 col-3 p-1">
                    <img class="comment-user-image" src="https://www.bspmediagroup.com/event/img/logos/user_placeholder.png" alt="Generic placeholder image">
                    <p class="text-center">{{ $comment->author->first_name }} {{ $comment->author->last_name }}</p>
                </div>
                <div class="col-md-10 col-sm-9 col-9 p-0 pl-2">
                    <div class="media-body">
                        <h5 class="mt-0">{{ $comment->subject }}</h5>
                        {{ $comment->content }}

                        @foreach($post->comments->where('parent_id', $comment->id) as $reply)
                            <div class="media mt-4">
                                <div class="col-md-2 col-sm-3 col-3 p-1">
                                    <img class="comment-user-image" src="https://www.bspmediagroup.com/event/img/logos/user_placeholder.png" alt="Generic placeholder image">
                                    <p class="text-center comment-author-name-reply">{{ $comment->author->first_name }} {{ $comment->author->last_name }}</p>
                                </div>
                                <div class="col-md-10 col-sm-9 col-9 p-0 pl-2">
                                    <div class="media-body">
                                        <h5 class="mt-0">{{ $comment->subject }}</h5>
                                        {{ $comment->content }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            @if($loop->last == false)
                <hr>
            @endif

        @endforeach
    </div>
</div>
