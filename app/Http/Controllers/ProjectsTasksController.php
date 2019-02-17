<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Project;

class ProjectsTasksController extends Controller
{
    public function create(Project $project)
    {
        $project->addTask(request()->validate([
            'description'=>'required|min:3'
            ]));

        return back();
    }
       
    public function update(Task $task)
    {
        $task->update([
            'completed' => request()->has('completed')
        ]);

        return back();
    }
}
