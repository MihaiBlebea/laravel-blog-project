<div class="card">
    <div class="card-body">
        <div class="media">
            <div class="mini-featured-image mr-3" style="background-image: url('{{ public_upload_path($post->feature_image) }}');"></div>
            <div class="media-body">
                <h5 class="mt-0">{{ $post->title }}</h5>
                <p>
                    Category: <strong>{{ $post->category->name }}</strong>  |
                    Slug: <strong>{{ $post->slug }}</strong>  |
                    <strong>{{ ($post->published) ? 'Published' : 'Not published' }}</strong>
                </p>
                <ul class="nav">
                    @if($post->published == false)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('post.publish', ['post' => $post->slug ]) }}">Publish</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('post.update', ['post' => $post->slug ]) }}">Edit</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Delete</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
