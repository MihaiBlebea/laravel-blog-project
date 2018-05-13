<form action="{{ route('search') }}" method="POST">
    @csrf

    <input name='model' type="hidden" class="form-control" value="{{ $model }}">

    <div class="input-group">
        <input name='search_term' type="text" class="form-control" placeholder="Search post...">
        <div class="input-group-append d-block d-md-none">
            <button type="submit" class="btn btn-outline-primary">Search</button>
        </div>
    </div>

</form>

@push('script')
    <script>
        alert('ceva')
    </script>
@endpush
