@extends('layouts._admin')


@section('admin_panel')

    @include('partials._page-title', ['title' => 'Update profile'])

    <form action="{{ route('user.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <div class="col-md-12">
                @include('partials._chapter-title', ['title' => 'Contact details'])
            </div>
        </div>

        <div class="form-group">
            <label for="first_name" class="col">First name:</label>

            <div class="col-md-6">
                <input id="first_name"
                       type="text"
                       class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}"
                       name="first_name"
                       value="{{ $user->first_name or old('first_name') }}" required>

                @if ($errors->has('first_name'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('first_name') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <label for="last_name" class="col">Last name:</label>

            <div class="col-md-6">
                <input id="last_name"
                       type="text"
                       class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}"
                       name="last_name"
                       value="{{ $user->last_name or old('last_name') }}"
                       required>

                @if ($errors->has('last_name'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('last_name') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <label for="email" class="col">Email:</label>

            <div class="col-md-6">
                <input id="email"
                       type="email"
                       class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                       name="email"
                       value="{{ $user->email or old('email') }}"
                       required>

                @if ($errors->has('email'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-12">
                @include('partials._chapter-title', ['title' => 'Profile information'])
            </div>
        </div>

        <div class="form-group">
            <label class="col" for="profile_image">Upload profile image:</label>
            <div class="col">
                <file-upload :name="'profile_image'"></file-upload>
            </div>
        </div>

        <div class="form-group">
            <label class="col" for="short_description">Short description:</label>
            <div class="col-md-12">
                <textarea class="form-control"
                          name="short_description"
                          id="short_description"
                          rows="4">{{ $user->profile->short_description or old('short_description') }}</textarea>

                @if($errors->has('short_description'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('short_description') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <label class="col" for="description">Description:</label>
            <div class="col-md-12">

                <!-- Rich text editor -->
                <vue-editor-wrapper :draft-id="'{{ json_encode($user->profile->id) }}'"
                                    :init-content="'{{ isset($user->profile->description) ? $user->profile->description : '' }}'"
                                    :api="'/api/v1/upload/profile'"
                                    :name="'description'">
                </vue-editor-wrapper>
                <!-- Rich text editor -->
            </div>
        </div>

        <!-- <div class="form-group">
            <label class="col" for="description">Description:</label>
            <div class="col-md-12">
                <textarea class="form-control"
                          name="description"
                          id="description"
                          rows="10">{{ $user->profile->description or old('description') }}</textarea>

                @if($errors->has('description'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span>
                @endif
            </div>
        </div> -->

        <div class="mt-5">
            @include('partials._form-button', ['cta' => 'Save'])
        </div>

    </form>
@endsection
