<div class="form-group">
    <label>Name:</label>
    <input type="text"
           name="name"
           class="form-control"
           value="{{ $category->name or old('name') }}">

    @if($errors->has('name'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
    @endif
</div>

<div class="form-group">
    <label>Description:</label>
    <textarea class="form-control"
              name="description"
              rows="6">{{ $category->description or old('description') }}</textarea>

    @if($errors->has('description'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('description') }}</strong>
        </span>
    @endif
</div>

<div class="form-group">
    <label>Cover image:</label>

    <image-modal multiple-img="false"
                 default-image="{{ $category->image ?? '' }}"
                 name="cover_image"
                 user="{{ auth()->user()->slug }}">
    </image-modal>

</div>

<div class="mt-5">
    @include('partials._form-button', ['cta' => 'Save'])
</div>
