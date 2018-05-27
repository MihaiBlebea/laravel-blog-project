<form action="{{ route('message.send') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text"
               name="name"
               class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
               id="name"
               value="{{ old('name') }}">

        @if($errors->has('name'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email"
               name="email"
               class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
               id="email"
               value="{{ old('email') }}">

        @if($errors->has('email'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group">
        <label for="content">Message:</label>
        <textarea class="form-control {{ $errors->has('content') ? 'is-invalid' : '' }}"
                  name="content"
                  id="content"
                  rows="8">{{ old('content') }}</textarea>

        @if($errors->has('content'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('content') }}</strong>
            </span>
        @endif
    </div>

    <div class="mt-5">
        @include('partials._form-button', ['cta' => 'Send'])
    </div>
</form>
