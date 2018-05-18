<div class="card">
    <div class="card-body p-4">
        <div class="media">
            <div class="mini-featured-image mr-3"
                 style="background-image: url('{{ public_upload_path( isset($user->profile) ? $user->profile->profile_image : null) }}');"></div>
            <div class="media-body">
                <h5 class="mt-0">{{ $user->first_name }} {{ $user->last_name }}</h5>
                <p>
                    @hasProfile($user)
                        {{ $user->profile->short_description }}
                    @endif
                </p>
                <ul class="nav float-right">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('blog.user', [ 'user' => $user->slug ]) }}">Read posts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.profile', [ 'user' => $user->slug ]) }}">See profile</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
