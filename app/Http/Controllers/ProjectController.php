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
    public function index(User $user = null)
    {
        if($user == null)
        {
            $user = auth()->user();
        }
        $projects = $user->projects()->paginate(10);
        return view('projects.index')->with('projects', $projects);
    }

    public function get(Project $project)
    {
        dd($project);
        return view('projects.project')->with('project', $project);
    }

    public function getStore()
    {
        //
    }

    public function postStore(ProjectFormRequest $request)
    {
        //
    }

    public function getUpdate(Project $project)
    {
        //
    }

    public function storeUpdate(ProjectFormRequest $request, Project $project)
    {
        //
    }

    public function delete(Project $project)
    {

    }
}
