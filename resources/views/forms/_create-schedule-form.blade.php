<form action="{{ route('schedule.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label>Schedule post</label>
        <select name="post" class="form-control text-capitalize">
            @foreach($posts as $post)

                <option value="{{ $post->id }}" {{ old('post') && old('post') === $post->id ? 'selected' : '' }}>
                    {{ $post->title }}
                </option>

            @endforeach
        </select>

        @if($errors->has('post'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('post') }}</strong>
            </span>
        @endif
    </div>

    <div class="row">
        <div class="col">
            <label>Pick social channel</label>
            <select name="channel" class="form-control text-capitalize {{ $errors->has('channel') ? 'is-invalid' : '' }}">
                @foreach($channels as $channel)

                    <option value="{{ $channel->id }}" {{ old('channel') && old('channel') === $channel->id ? 'selected' : '' }}>
                        {{ $channel->channel }}
                    </option>

                @endforeach
            </select>

            @if($errors->has('channel'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('channel') }}</strong>
                </span>
            @endif
        </div>

        <div class="col">
            <div class="form-group">
                <label>Pick date</label>
                <input class="form-control {{ $errors->has('datetime') ? 'is-invalid' : '' }}" type="datetime-local" name="datetime">

                @if($errors->has('datetime'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('datetime') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>

    <div class="mt-5">
        @include('partials._form-button', ['cta' => 'Save'])
    </div>
</form>
