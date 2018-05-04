<div class="form-group">
    <label for="title">Title:</label>
    <input type="text"
           name="title"
           class="form-control"
           id="title"
           aria-describedby="title"
           placeholder="Create title"
           value="{{ $post->title or old('title') }}">

    @if($errors->has('title'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('title') }}</strong>
        </span>
    @endif
</div>

<div class="form-group">
    <label for="content">Content:</label>
    <textarea class="form-control"
              name="content"
              id="content"
              rows="10">{{ $post->content or old('content') }}</textarea>

    @if($errors->has('content'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('content') }}</strong>
        </span>
    @endif
</div>

<div class="form-group">
    <label for="category">Select category:</label>
    <select name="category_id" class="form-control" id="category">
        @foreach($categories as $category)

            <option value="{{ $category->id }}"
                    {{ ($post->category->id === $category->id) ? 'selected' : '' }}>{{ $category->name }}</option>

        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="feature_image">Upload feature image:</label>
    <div>
        <input type="file" name="feature_image" id="feature_image">
    </div>
</div>

<button type="submit" class="btn btn-outline-primary">Save</button>
