<form action="{{ route('search') }}" method="POST">
    @csrf

    <input name='model' type="hidden" class="form-control" value="{{ $model }}">

    <div class="input-group">
        <input name='search_term' type="text" class="form-control">
        <div class="input-group-append">
            <button type="submit" class="btn btn-outline-secondary">Search</button>
        </div>
    </div>

</form>
