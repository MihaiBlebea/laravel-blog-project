<form action="{{ route('message.send') }}" method="POST">
    @csrf

    <div class="form-group">
        <label>Name:</label>
        <input type="text"
               name="name"
               class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
               value="{{ old('name') }}">

        <span class="invalid-feedback">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
    </div>

    <div class="form-group">
        <label>Email:</label>
        <input type="email"
               name="email"
               class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
               value="{{ old('email') }}">

        <span class="invalid-feedback">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
    </div>

    <div class="form-group">
        <label>Message:</label>
        <textarea class="form-control {{ $errors->has('content') ? 'is-invalid' : '' }}"
                  name="content"
                  rows="8">{{ old('content') }}</textarea>

            <span class="invalid-feedback">
                <strong>{{ $errors->first('content') }}</strong>
            </span>
        </div>

        <div class="mt-5">
            @include('partials._form-button', ['cta' => 'Send'])
        </div>
    </form>
