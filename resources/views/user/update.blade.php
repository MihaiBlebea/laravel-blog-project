@extends('layouts._profile')

@section('profile_content')
    <h1 class="mb-5">Update profile</h1>
    <form action="{{ route('user.update', [ 'user' => $user->id ]) }}" method="POST">
        @csrf

        @include('forms._user-profile-update')
    </form>
@endsection
