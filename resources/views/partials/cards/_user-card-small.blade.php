<div class="row">
    <a href="{{ route('user.profile', ['user' => $user->slug]) }}">
        <img class="profile-img mr-2 ml-3" src="{{ Gravatar::src(auth()->user()->email, 640) }}">
    </a>
    <div class="col">
        <a href="{{ route('user.profile', ['user' => $user->slug]) }}">
            <strong>{{ $user->first_name }} {{ $user->last_name }}</strong>
        </a>
        <p>{{ $user->profile->except() }}...  <a href="{{ route('user.profile', ['user' => $user->slug]) }}">read more</a></p>
    </div>
</div>
<hr>
