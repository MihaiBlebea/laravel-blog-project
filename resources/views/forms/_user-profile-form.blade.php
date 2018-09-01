<div class="form-group">
    @include('partials.titles._chapter-title', ['title' => 'Contact details'])
</div>

<div class="row form-group">
    <div class="col-md-6">
        <label>First name:</label>

        <input type="text"
               class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}"
               name="first_name"
               value="{{ $user->first_name or old('first_name') }}" required>

        <span class="invalid-feedback">
            <strong>{{ $errors->first('first_name') }}</strong>
        </span>
    </div>
</div>

<div class="row form-group">
    <div class="col-md-6">
        <label for="last_name">Last name:</label>

        <input type="text"
               class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}"
               name="last_name"
               value="{{ $user->last_name or old('last_name') }}"
               required>

        <span class="invalid-feedback">
            <strong>{{ $errors->first('last_name') }}</strong>
        </span>
    </div>
</div>

<div class="row form-group">
    <div class="col-md-6">
        <label>Email:</label>

        <input type="email"
               class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
               name="email"
               value="{{ $user->email or old('email') }}"
               required>

        <span class="invalid-feedback">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
    </div>
</div>

<div class="form-group">
    @include('partials.titles._chapter-title', ['title' => 'Profile information'])
</div>

<div class="form-group">
    <label>Upload profile image:</label>

    <image-modal multiple-img="false"
                 default-image="{{ $user->profile->image ?? '' }}"
                 name="profile_image"
                 user="{{ $user->slug }}">
    </image-modal>

</div>

<div class="form-group">
    <label>Short description:</label>
    <textarea class="form-control"
              name="short_description"
              rows="4">{{ $user->profile->short_description or old('short_description') }}</textarea>

    @if($errors->has('short_description'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('short_description') }}</strong>
        </span>
    @endif
</div>

<div class="form-group">
    <label>Detailed description:</label>

    <markdown-editor input-name="description"
                     input-content="{{ isset($user->profile) ? $user->profile->description : null }}">
    </markdown-editor>

    <span class="invalid-feedback">
        <strong>{{ $errors->first('description') }}</strong>
    </span>
</div>
