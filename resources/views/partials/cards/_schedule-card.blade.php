<div class="card {{ $schedule->publish_datetime < \Carbon\Carbon::now() ? 'border border-danger' : '' }}">
    <a href="{{ route('blog.post', [ 'category' => $schedule->post->category->slug, 'post' => $schedule->post->slug ]) }}"
       style="position:relative;">
        <img style="max-width:100%" src="{{ asset($schedule->post->image->path ?? 'images/post-placeholder.png') }}">
        <p class="card-title card-title--overlay card-title--overlay__white p-2 mb-0">
            <strong>{{ $schedule->post->title }}</strong>
        </p>
    </a>
    <div class="card-body">
        <p class="mb-2">
            @ <span class="text-capitalize">{{ $schedule->socialToken->channel }}</span> |
            {{ \Carbon\Carbon::parse($schedule->publish_datetime)->format('d/m/Y H:m') }}
        </p>
        <p class="mb-2 text-center">
            <a href="{{ route('schedule.update', [ 'schedule' => $schedule->id ]) }}" class="mr-2">Edit</a>
            <a href="{{ route('schedule.delete', [ 'schedule' => $schedule->id ]) }}" class="text-danger">Delete</a>
        </p>
    </div>
</div>
