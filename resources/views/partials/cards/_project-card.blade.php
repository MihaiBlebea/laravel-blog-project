<div class="card">
    <a href="{{ route('project.get', ['project' => $project->slug]) }}">
        <img class="profile-img {{ (isset($show_description) && $show_description == true) ? 'xl' : 'lg'}}"
             style="width: 100%;"
             src="{{ asset($project->images[0]->path ?? 'images/post-placeholder.png') }}">
    </a>
    <div class="card-body">
        <h2 class="card-title">{{ $project->name }}</h2>

        @if(isset($show_description) && $show_description == true)
            <p class="card-text">{{ $project->short_description }}</p>
        @endif

        <a href="{{ route('project.get', [ 'project' => $project->slug ]) }}" class="btn btn-primary">Open</a>
    </div>
    <div class="card-footer">
        <small class="text-muted float-left">{{ $project->user->first_name }} {{ $project->user->last_name }}. on {{ $project->created_at->toDateString() }}</small>
        <small class="text-muted float-right">written in {{ $project->language }}</small>
    </div>
</div>
