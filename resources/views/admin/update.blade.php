@extends('layouts._admin')


@section('admin_panel')

    @include('partials.titles._page-title', ['title' => 'Update profile'])

    <form action="{{ route('user.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        @include('forms._user-profile-form')

        <div class="mt-5">
            @include('partials._form-button', ['cta' => 'Save'])
        </div>

    </form>
@endsection
