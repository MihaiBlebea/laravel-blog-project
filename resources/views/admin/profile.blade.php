@extends('layouts._admin')

@section('admin_panel')

    @include('partials._page-title', [
        'title' => $user->first_name . ' ' . $user->last_name,
        'subtitle' => 'dev profile'
    ])

@endsection
