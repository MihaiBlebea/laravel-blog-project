<div class="row">
    <a href="{{ route('user.profile', ['user' => $user->slug]) }}">
        <img class="profile-img mr-3" src="{{ asset($user->profile->image->path ?? 'images/profile-placeholder.jpg') }}">
    </a>
    <div class="col">
        <a href="{{ route('user.profile', ['user' => $user->slug]) }}">
            <strong>{{ $user->first_name }} {{ $user->last_name }}</strong>
        </a>
        <p>{{ $user->profile->except() }}...  <a href="{{ route('user.profile', ['user' => $user->slug]) }}">read more</a></p>
    </div>
</div>
<hr>
