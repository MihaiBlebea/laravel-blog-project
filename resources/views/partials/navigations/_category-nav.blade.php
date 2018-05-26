<ul class="nav justify-content-center mb-3">
    @foreach($categories as $category)
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('blog.category', ['category' => $category->slug]) }}">
                <strong>{{ $category->name }}</strong>
            </a>
        </li>
    @endforeach
</ul>
