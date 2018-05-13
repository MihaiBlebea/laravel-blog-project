<div class="card">
    <div class="card-body">
        <div class="media">
            <div class="mini-featured-image mb-2 mr-3" style="background-image: url('{{ public_upload_path($comment->author->profile_image) }}');"></div>
            <!-- <img class="mr-3 comment-user-image" src="{{ public_upload_path($comment->author->profile_image) }}" alt="profile image"> -->
            <div class="media-body">
                <h5 class="mt-0">{{ $comment->author->first_name }} {{ $comment->author->last_name }} says:</h5>
                {{ $comment->content }}

                @if($comment->parent_id === null)
                    <div class="mt-2">
                        <a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                            Reply
                        </a>

                        <div class="collapse mt-2" id="collapseExample">
                            <form action="{{ route('comment.store') }}" method="POST">
                                @csrf

                                @include('forms._comment-reply-form')
                            </form>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
