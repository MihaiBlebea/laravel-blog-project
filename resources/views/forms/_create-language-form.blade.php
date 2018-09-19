
<div class="form-group">
    <label>Name</label>
    <input type="text"
           name="name"
           class="form-control"
           placeholder="Language name"
           value="{{ $language->name or old('name') }}">
</div>

<div class="form-group">
    <label>Percentage</label>
    <input type="number"
           name="percentage"
           class="form-control"
           placeholder="Language skill percentage"
           value="{{ $language->percentage or old('percentage') }}">
</div>

<div class="form-group">
    <label>Years of experience</label>
    <input type="text"
           name="experience_years"
           class="form-control"
           placeholder="Years of experience"
           value="{{ $language->experience_years or old('experience_years') }}">
</div>
