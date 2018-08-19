<form action="{{ route('lead.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label>Email address</label>
        <input type="email"
               class="form-control"
               placeholder="Enter your active email"
               name="email"
               value="{{ old('email') }}">
        <small class="form-text text-muted">We'll never share your email with anyone else.</small>

        @if($errors->has('email'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group form-check">
        <input type="checkbox"
               class="form-check-input"
               value="true"
               name="consent"
               checked>
        <label class="form-check-label">I am happy to receive monthly emails with valuable content</label>
    </div>


    <div class="row justify-content-center mt-5">
        <div class="col-md-4">
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </div>
    </div>
</form>
