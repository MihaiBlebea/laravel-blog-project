<div class="card">
    <a href="{{ route('blog.category', [ 'category' => $category->slug ]) }}">
    <div class="card-body bg" style="background-image: url('{{ public_upload_path($category->cover_image) }}')">
        <div class="overlay"></div>
        <h3 class="card-title">{{ $category->name }}</h3>
    </div>
    </a>
</div>
