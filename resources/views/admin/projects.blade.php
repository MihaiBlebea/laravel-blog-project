@extends('layouts._admin')

@section('admin_panel')

@include('partials._page-title', ['title' => 'Projects', 'subtitle' => 'Manage projects'])

<div class="card">
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Status</th>
                    @role('admin')
                        <th scope="col">Owner</th>
                    @endif
                    <th scope="col">Update</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($projects as $index => $project)
                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>
                            <a href="{{ route('project.get', [ 'project' => $project->slug ]) }}">
                                {{ $project->name }}
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('project.status', [ 'project' => $project->slug, 'status' => ($project->status == 'published') ? 'draft' : 'published' ]) }}">
                                {{ $project->status }}
                            </a>
                        </td>
                        @role('admin')
                            <td>{{ $project->user->first_name }} {{ $project->user->last_name }}</td>
                        @endif
                        <td><a href="{{ route('project.update', ['project' => $project->slug] )}}">Update</a></td>
                        <td><a class="text-danger" href="{{ route('project.delete', ['$project' => $project->slug]) }}">Delete</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('project.store') }}">New Project</a>
            </li>
        </ul>
    </div>
</div>

<div class="row mt-3 justify-content-center">
    {{ $projects->links() }}
</div>
@endsection
