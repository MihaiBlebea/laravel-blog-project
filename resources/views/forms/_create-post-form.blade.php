<div class="form-group">
    <label>Title:</label>
    <input type="text"
           name="title"
           class="form-control"
           placeholder="Create title"
           value="{{ $post->title or old('title') }}">

    @if($errors->has('title'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('title') }}</strong>
        </span>
    @endif

</div>

<div class="form-group">
    <label for="intro">Main content:</label>
    <!-- Markdown editor -->
    <markdown-editor input-name="content"
                     input-content="{{ isset($post) ? $post->content : "**bold intro - Write a short lead intro**" }}">
    </markdown-editor>
    <!-- Markdown editor -->

</div>

<div class="row form-group">
    <div class="col">

        <label>Select category:</label>
        <select name="category_id" class="form-control">
            @foreach($categories as $category)

                <option value="{{ $category->id }}" {{ (isset($post) && $post->category->id === $category->id) ? 'selected' : '' }}>{{ $category->name }}</option>

            @endforeach
        </select>

    </div>
    <div class="col">

        <label>Save or publish:</label>
        <select name="status" class="form-control">
            <option value="draft" selected>Save draft</option>
            <option value="published">Publish</option>
        </select>

    </div>
</div>

<div class="form-group">
    <label>Upload feature image:</label>

    <image-modal multiple-img="false"
                 default-image="{{ isset($post) ? $post->image : '' }}"
                 name="feature_image"
                 user="{{ auth()->user()->slug }}">
    </image-modal>

</div>

<div class="form-check">
    <input class="form-check-input" name="publish_medium" type="checkbox" value="true">
    <label class="form-check-label">
        Publish on Medium
    </label>
</div>

<div class="mt-5">
    @include('partials._form-button', ['cta' => 'Save'])
</div>
