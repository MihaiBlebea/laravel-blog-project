@extends('layouts._profile')

@section('profile_content')
    <h1 class="mb-5">{{ $user->first_name }} {{ $user->last_name }}'s profile</h1>
@endsection
