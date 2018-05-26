<div class="form-group">
    <label for="name">Name:</label>
    <input type="text"
           name="name"
           class="form-control"
           id="name"
           aria-describedby="name"
           placeholder="Project name"
           value="{{ $project->name or old('name') }}">

    @if($errors->has('name'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
    @endif
</div>

<div class="form-group">
    <label for="short_description">Short description:</label>
    <textarea class="form-control"
              name="short_description"
              id="short_description"
              rows="5">{{ $project->short_description or old('short_description') }}</textarea>

    @if($errors->has('short_description'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('short_description') }}</strong>
        </span>
    @endif
</div>

<div class="form-group">

    <label for="short_description">Project description:</label>
    <!-- Rich text editor -->
    <vue-editor-wrapper :draft-id="'{{ json_encode($project->id) }}'"
                        :init-content="'{{ isset($project->description) ? $project->description : '' }}'"
                        :api="'/api/v1/upload/project'"
                        :name="'description'">
    </vue-editor-wrapper>
    <!-- Rich text editor -->

</div>

<div class="row form-group">
    <div class="col">

        <label for="link">Project link:</label>
        <input type="text"
               name="link"
               class="form-control"
               id="link"
               aria-describedby="link"
               placeholder="Project link"
               value="{{ $project->link or old('link') }}">

        @if($errors->has('link'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('link') }}</strong>
            </span>
        @endif

    </div>
    <div class="col">

        <label for="status">Status:</label>
        <select name="status" class="form-control" id="status">
            <option value="draft">Save as draft</option>
            <option value="published">Publish</option>
        </select>

    </div>
</div>

<div class="form-group">
    <label for="language">Main language used:</label>
    <select name="language" class="form-control" id="language">
        <option disabled selected>Choose a language</option>
        <option value="javascript">Javascript</option>
        <option value="php">PHP</option>
        <option value="python">Python</option>
        <option value="go">Got</option>
        <option value="swift">Swift</option>
        <option value="Java">java</option>
    </select>

    @if($errors->has('short_description'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('short_description') }}</strong>
        </span>
    @endif
</div>

<div class="form-group">
    <label for="feature_image">Upload feature image:</label>

    <image-modal multiple-img="true"
                 default-image="{{ $post->image ?? '' }}"
                 name="images"
                 user="{{ auth()->user()->slug }}">
    </image-modal>

</div>

<div class="mt-5">
    @include('partials._form-button', ['cta' => 'Save'])
</div>
