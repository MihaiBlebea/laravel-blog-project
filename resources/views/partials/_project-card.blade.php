<div class="card">
    <div class="card-body p-4">
        <h4>{{ $project->name }}</h4>
        <ul class="nav float-right">
            @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('project.update', [ 'project' => $project->slug ]) }}">Update</a>
                </li>
            @endauth
            <li class="nav-item">
                <a class="nav-link" href="{{ route('project.get', [ 'project' => $project->slug ]) }}">See profile</a>
            </li>
        </ul>
    </div>
</div>
