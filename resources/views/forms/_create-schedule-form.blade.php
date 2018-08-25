
<schedule-post-selector></schedule-post-selector>

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
