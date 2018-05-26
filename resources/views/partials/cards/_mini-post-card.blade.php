<div class="card">
    <div class="card-body">
        <div class="media">
            <img class="profile-img mr-3" src="{{ asset($post->image->path ?? 'images/profile-placeholder.jpg') }}">
            <div class="media-body">
                <h5 class="mt-0">{{ $post->title }}</h5>
                <p><strong>{{ $post->category->name }}</strong></p>
                <p>{{ $post->created_at->diffForHumans() }}</p>
            </div>
        </div>
    </div>
</div>
