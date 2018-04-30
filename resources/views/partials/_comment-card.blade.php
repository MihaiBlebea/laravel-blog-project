<div class="card">
    <div class="card-body">
        <div class="media">
            <img class="mr-3 comment-user-image" src="https://www.bspmediagroup.com/event/img/logos/user_placeholder.png" alt="Generic placeholder image">
            <div class="media-body">
                <h5 class="mt-0">{{ $comment->author->first_name }} {{ $comment->author->last_name }} says:</h5>
                {{ $comment->content }}
                
                @if($comment->parent_id === null)
                    <div class="mt-2">
                        <a href="">Reply</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
