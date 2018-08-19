<div class="form-group">
    @include('partials.titles._chapter-title', ['title' => 'Contact details'])
</div>

<div class="form-group">
    <label for="first_name">First name:</label>

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

<div class="form-group">
    <label for="last_name">Last name:</label>

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

<div class="form-group">
    <label for="email">Email:</label>

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

<div class="form-group">
    @include('partials.titles._chapter-title', ['title' => 'Profile information'])
</div>

<div class="form-group">
    <label for="profile_image">Upload profile image:</label>

    <image-modal multiple-img="false"
                 default-image="{{ $user->profile->image ?? '' }}"
                 name="profile_image"
                 user="{{ $user->slug }}">
    </image-modal>

</div>

<div class="form-group">
    <label for="short_description">Short description:</label>
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
