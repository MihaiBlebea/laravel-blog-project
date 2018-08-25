<div class="card">
    <a href="{{ route('project.get', ['project' => $project->slug]) }}" class="position-relative">
        <div class="image--bg image--bg__medium w-100"
             style="background-image: url('{{ asset($project->images[0]->path ?? 'images/post-placeholder.png') }}');">
        </div>

        <h3 class="card-title card-title--overlay card-title--overlay__white p-2 mb-0">
            {{ $project->name }}
        </h3>
    </a>
    {{-- <div class="card-body">
        <p>{{ $project->short_description }}</p>
    </div> --}}
</div>
