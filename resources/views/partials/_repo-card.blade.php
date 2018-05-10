<div class="card">
    <div class="card-body">
        <h5>{{ $index + 1 }}. {{ $repo->full_name }}</h5>

        <form action="{{ route('repo.add') }}" method="POST">
            @csrf

            <input type="hidden" name="repo_url" value="{{ $repo->url }}">

            <button type="submit" class="btn btn-outline-primary">Add</button>
        </form>
    </div>
</div>
