<form action="{{ route('search') }}" method="POST">
    @csrf

    <div class="input-group">
        <input type="text"
               class="form-control"
               placeholder="Search..."
               name="search_term">
        <div class="input-group-append">
            <button class="btn btn-outline-primary" type="submit">
                <i class="fa fa-search"></i>
            </button>
        </div>
    </div>


</form>
