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

    <p class="mt-3">
        <strong>Preview:</strong>
        <a target="_blank" href="{{ route('post.preview', ['post' => $post->slug]) }}">
            <span class="text-primary">{{ config('app.url') . '/blog/' . $post->category->slug . '/' . $post->slug }}</span>
        </a>
    </p>
</div>

<div class="form-group">

    <!-- Rich text editor -->
    <vue-editor-wrapper :draft-id="'{{ json_encode($post->id) }}'"
                        :init-content="'{{ isset($post->content) ? $post->content : '' }}'"
                        :api="'/api/v1/upload/post'"
                        :name="'content'">
    </vue-editor-wrapper>
    <!-- Rich text editor -->

</div>

<div class="row form-group">
    <div class="col">

        <label for="category">Select category:</label>
        <select name="category_id" class="form-control" id="category">
            @foreach($categories as $category)

                <option value="{{ $category->id }}"
                        {{ (isset($post->category) && $post->category->id === $category->id) ? 'selected' : '' }}>{{ $category->name }}</option>

            @endforeach
        </select>

    </div>
    <div class="col">

        <label for="publish_mode">Publish?:</label>
        <select name="publish_mode" class="form-control" id="publish_mode">
            <option value="save">Save</option>
            <option value="publish">Publish</option>
        </select>
        <!-- <input type="datetime-local" class="form-control" id="publish_date"> -->

    </div>
</div>

<div class="form-group">
    <label for="feature_image">Upload feature image:</label>
    <div>
        <file-upload :name="'feature_image'"></file-upload>
    </div>
</div>

<div class="mt-5">
    @include('partials._form-button', ['cta' => 'Save'])
</div>
