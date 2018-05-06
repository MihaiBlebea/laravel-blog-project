<div class="form-group">
    <label for="name">Name:</label>
    <input type="text"
           name="name"
           class="form-control"
           id="name"
           aria-describedby="name"
           value="{{ $category->name or old('name') }}">

    @if($errors->has('name'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
    @endif
</div>

<div class="form-group">
    <label for="description">Description:</label>
    <textarea class="form-control"
              name="description"
              id="description"
              rows="10">{{ $category->description or old('description') }}</textarea>

    @if($errors->has('description'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('description') }}</strong>
        </span>
    @endif
</div>

<div class="form-group">
    <label for="cover_image">Cover image:</label>
    <div>
        <input type="file" name="cover_image" id="cover_image">
    </div>
</div>

<button type="submit" class="btn btn-outline-primary">Save</button>
