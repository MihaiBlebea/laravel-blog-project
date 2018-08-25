<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProjectFormRequest;
use App\Models\{
    User,
    Project
};

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $schema = Project::query();

        if($request->input('status') !== null && collect(['draft', 'published'])->contains($request->input('status')))
        {
            $schema = $schema->where('status', $request->input('status'));
        } else {
            $schema = $schema->where('status', 'published');
        }
        $projects = $schema->paginate(10);

        return view('projects.index')->with('projects', $projects);
    }

    public function get(Project $project)
    {
        $projects = $project->user->projects()->where('id', '!=', $project->id)->limit(3)->get();
        return view('projects.project')->with([
            'project' => $project,
            'projects' => $projects
        ]);
    }

    public function manage()
    {
        $user = auth()->user();
        if($user->hasRole('admin'))
        {
            $projects = Project::paginate(10);
        } else {
            $projects = $user->projects()->paginate(10);
        }
        return view('admin.projects')->with('projects', $projects);
    }

    public function status(Request $request, Project $project)
    {
        if($request->input('status') !== null && collect(['draft', 'published'])->contains($request->input('status')))
        {
            $project->update([ 'status' => $request->input('status') ]);
            return redirect()->back()->with([
                'message'     => 'Your project status has been updated',
                'alert_class' => 'success'
            ]);
        }
        return redirect()->back()->with([
            'message'     => 'Your project has not been updated',
            'alert_class' => 'danger'
        ]);
    }

    public function getStore()
    {
        return view('projects.create')->with([
            'statuses'  => Project::getStatuses(),
            'languages' => Project::getLanguages()
        ]);
    }

    public function postStore(Request $request)
    {
        $project = Project::create([
            'user_id'           => auth()->user()->id,
            'name'              => $request->input('name'),
            'short_description' => $request->input('short_description'),
            'description'       => $request->input('description'),
            'language'          => $request->input('language'),
            'link'              => $request->input('link'),
            'status'            => $request->input('status'),
        ]);

        if($project)
        {
            $notification = [
                'message'     => 'Your project has been saved',
                'alert_class' => 'success'
            ];
        } else {
            $notification = [
                'message'     => 'Your project could not be saved',
                'alert_class' => 'danger'
            ];
        }
        return redirect()->back()->with($notification);
    }

    public function getUpdate(Project $project)
    {
        return view('projects.store')->with([
            'project'   => $project,
            'statuses'  => Project::getStatuses(),
            'languages' => Project::getLanguages()
        ]);
    }

    public function postUpdate(ProjectFormRequest $request, Project $project)
    {
        $project->update([
            'name'              => $request->input('name'),
            'short_description' => $request->input('short_description'),
            'description'       => $request->input('description'),
            'link'              => $request->input('link'),
            'language'          => $request->input('language'),
            'status'            => $request->input('status')
        ]);

        foreach($request->input('images') as $image)
        {
            $project->images()->attach($image);
        }

        return redirect()->route('project.manage');
    }

    public function delete(Project $project)
    {
        $project->delete();
        return redirect()->back();
    }
}
