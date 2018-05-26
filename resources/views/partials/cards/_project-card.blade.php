<div class="card">
    <div class="card-body">
        <h5>{{ $project->name }}</h5>
        <ul class="nav float-right">
            @role('admin')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('project.update', [ 'project' => $project->slug ]) }}">Update</a>
                </li>
            @endif
            <li class="nav-item">
                <a class="nav-link" href="{{ route('project.get', [ 'project' => $project->slug ]) }}">Open</a>
            </li>
        </ul>
    </div>
</div>
