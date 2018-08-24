<div class="form-group">
    <label>Schedule post</label>
    <select name="post" class="form-control {{ $errors->has('post') ? 'is-invalid' : '' }}">
        <option disabled {{ old('post') ? '' : 'selected' }}>Pick post</option>
        @foreach($posts as $post)

            <option value="{{ $post->id }}"
                {{ (old('post') === $post->id) ? 'selected' : '' }}>
                <span class="text-capitalize">{{ $post->title }}</span>
            </option>

        @endforeach
    </select>

    @if($errors->has('post'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('post') }}</strong>
        </span>
    @endif
</div>

<div class="form-group">
    <label>Select social channel</label>
    <select name="channel" class="form-control {{ $errors->has('channel') ? 'is-invalid' : '' }}">
        <option disabled {{ old('channel') ? '' : 'selected' }}>Pick channel</option>
        @foreach($channels as $channel)

            <option value="{{ $channel->id }}"
                {{ (old('channel') === $channel->id) ? 'selected' : '' }}>
                <span class="text-capitalize">{{ $channel->channel }}</span>
            </option>

        @endforeach
    </select>

    @if($errors->has('channel'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('channel') }}</strong>
        </span>
    @endif
</div>

<div class="form-group">
    <label>Pick date</label>
    <input class="form-control {{ $errors->has('datetime') ? 'is-invalid' : '' }}"
           type="datetime-local"
           name="datetime">

    @if($errors->has('datetime'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('datetime') }}</strong>
        </span>
    @endif
</div>
