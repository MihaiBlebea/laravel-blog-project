<div class="card">
    <div class="card-body">
        <div class="media">
            <img class="profile-img mr-3" src="{{ asset($user->profile->image->path ?? 'images/profile-placeholder.jpg') }}">
            <div class="media-body">
                <h5 class="mt-0">{{ $comment->author->first_name }} {{ $comment->author->last_name }} says:</h5>
                {{ $comment->content }}

                @if($comment->parent_id === null)
                    <div class="mt-2">

                        @auth
                            <a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                Reply
                            </a>
                        @endauth

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
