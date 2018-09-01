<div class="row">
    @foreach($related_posts as $post)

        <div class="col-md-4 mb-3">
            @include('partials.cards._post-card-small')
        </div>

    @endforeach
</div>
