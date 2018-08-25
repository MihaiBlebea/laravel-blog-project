<div class="form-group">
    <label>Name:</label>
    <input type="text"
           name="name"
           class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
           placeholder="Project name"
           value="{{ $project->name ?? old('name') }}">

    <span class="invalid-feedback">
        <strong>{{ $errors->first('name') }}</strong>
    </span>
</div>

<div class="form-group">
    <label for="short_description">Short description:</label>
    <textarea class="form-control {{ $errors->has('short_description') ? ' is-invalid' : '' }}"
              name="short_description"
              rows="5">{{ $project->short_description ?? old('short_description') }}</textarea>

    <span class="invalid-feedback">
        <strong>{{ $errors->first('short_description') }}</strong>
    </span>
</div>

<div class="form-group">

    <label>Project description:</label>
    <!-- Markdown editor -->
    <markdown-editor input-name="description"
                     input-content="{{ isset($project) ? $project->description : null }}">
    </markdown-editor>
    <!-- Markdown editor -->

</div>

<div class="row">
    <div class="col-md-6">

        <div class="form-group">
            <label for="link">Project link:</label>
            <input type="text"
                   name="link"
                   class="form-control {{ $errors->has('link') ? ' is-invalid' : '' }}"
                   placeholder="Project link"
                   value="{{ $project->link ?? old('link') }}">

            <span class="invalid-feedback">
                <strong>{{ $errors->first('link') }}</strong>
            </span>
        </div>

        <div class="form-group">
            <label>Status:</label>
            <select name="status"
                    class="form-control {{ $errors->has('status') ? ' is-invalid' : '' }}">
                @foreach($statuses as $index => $status)
                    <option value="{{ $index }}" {{ (isset($project) && $project->hasStatus($index)) ? 'selected' : ''}}>{{ $status }}</option>
                @endforeach
            </select>

            <span class="invalid-feedback">
                <strong>{{ $errors->first('status') }}</strong>
            </span>
        </div>

        <div class="form-group">
            <label>Languages used:</label><br>
            @foreach($languages as $language)
                <div class="form-check form-check-inline">
                    <input class="form-check-input pointer"
                           name="languages[]"
                           type="checkbox"
                           value="{{ $language }}">
                    <label class="form-check-label">{{ $language }}</label>
                </div>
            @endforeach


            {{-- <select name="language"
                    class="form-control {{ $errors->has('language') ? ' is-invalid' : '' }}">

                @foreach($languages as $language)
                    <option value="{{ $language }}"
                            class="text-uppercase" {{ (isset($project) && $project->hasLanguage($language)) ? 'selected' : ''}}>{{ $language }}</option>
                @endforeach

            </select> --}}

            <span class="invalid-feedback">
                <strong>{{ $errors->first('short_description') }}</strong>
            </span>
        </div>
    </div>
</div>


<div class="form-group">
    <label>Upload feature image:</label>

    <image-modal multiple-img="true"
                 default-image="{{ $project->images ?? '' }}"
                 name="images"
                 user="{{ auth()->user()->slug }}">
    </image-modal>

</div>
