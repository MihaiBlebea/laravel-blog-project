<div class="row">
    <div class="col-md-2 col-4">
        <a href="{{ route('user.profile', ['user' => $user->slug]) }}">
            <img class="profile-img" src="{{ public_upload_path($user->profile_image) }}">
        </a>
    </div>
    <div class="col-md-10 col-8">
        <a href="{{ route('user.profile', ['user' => $user->slug]) }}">
            <strong>{{ $user->first_name }} {{ $user->last_name }}</strong>
        </a>
        <p>{{ $user->profile->except() }}...  <a href="{{ route('user.profile', ['user' => $user->slug]) }}">read more</a></p>
    </div>
</div>
<hr>
