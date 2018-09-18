
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>Company</label>
            <input type="text"
                   name="company_name"
                   class="form-control"
                   placeholder="Company name"
                   value="{{ $job->company_name or old('company_name') }}">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>Position</label>
            <input type="text"
                   name="position"
                   class="form-control"
                   placeholder="Your position"
                   value="{{ $job->position or old('position') }}">
        </div>
    </div>
</div>

<div class="form-group">
    <label>Company description</label>
    <textarea class="form-control" name="description" rows="6">{{ $job->description or old('description') }}</textarea>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>Start date</label>
            <input type="date"
                   name="start_date"
                   class="form-control">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>End date</label>
            <input type="date"
                   name="end_date"
                   class="form-control">
        </div>
    </div>
</div>
