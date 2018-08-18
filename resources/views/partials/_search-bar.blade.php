<form action="{{ route('search') }}" method="POST">
    @csrf

    <div class="input-group">
        <input name='search_term' type="text" class="form-control" placeholder="Search post...">
        <div class="input-group-append d-block d-md-none">
            <button type="submit" class="btn btn-outline-primary">Search</button>
        </div>
    </div>

</form>
