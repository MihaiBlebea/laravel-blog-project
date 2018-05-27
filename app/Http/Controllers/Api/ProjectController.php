<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Project;


class ProjectController extends Controller
{
    public function getProjectImages(Project $project)
    {
        return $project->images;
    }
}
