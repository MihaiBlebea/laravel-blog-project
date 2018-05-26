<div class="card">
    <a href="{{ route('image.get', ['image' => $image->id]) }}">
        <img class="card-img-top" src="{{ asset('storage/' . $image->path) }}" alt="Card image cap">
    </a>
    <div class="card-body">
        <p class="card-text">{{ $image->name }}</p>
    </div>
</div>
