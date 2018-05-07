@extends('layouts._admin')

@section('admin_panel')

    @include('partials._page-title', ['title' => 'Update profile'])

    <form action="{{ route('user.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right" for="profile_image">Upload profile image:</label>

            <div class="col-md-6">
                <input type="file" name="profile_image" id="profile_image" value="{{ $user->profile_image or old('profile_image') }}">

                @if ($errors->has('profile_image'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('profile_image') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        @include('forms._user-profile-update')

    </form>
@endsection
