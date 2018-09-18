<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Http\Requests\JobFormRequest;


class JobController extends Controller
{
    public function manage()
    {
        return view('admin.jobs')->with([
            'jobs' => Job::orderBy('start_date', 'desc')->get()
        ]);
    }

    public function getStore()
    {
        return view('jobs.create');
    }

    public function postStore(JobFormRequest $request)
    {
        $job = Job::create($request->all());
        if($job)
        {
            return redirect()->back()->with([
                'message'     => 'Your job entry has been created',
                'alert_class' => 'success'
            ]);
        }
    }

    public function getUpdate(Job $job)
    {
        return view('jobs.update')->with([
            'job' => $job
        ]);
    }

    public function postUpdate(JobFormRequest $request, Job $job)
    {
        $job->update($request->all());
        return redirect()->back()->with([
            'message'     => 'Your job entry has been updated',
            'alert_class' => 'success'
        ]);
    }

    public function delete(Job $job)
    {
        $job->delete();
        return redirect()->back()->with([
            'message'     => 'Your job entry has been deleted',
            'alert_class' => 'success'
        ]);
    }
}
