<div class="card">
    <a href="{{ route('project.get', ['project' => $project->slug]) }}" class="position-relative">
        <div class="image--bg image--bg__medium w-100"
             style="background-image: url('{{ asset($project->images[0]->path ?? 'images/post-placeholder.png') }}');">
        </div>
        <h3 class="card__title card__title--white p-2 mb-0">
            {{ $project->name }}
        </h3>
    </a>
</div>
