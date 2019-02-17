<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }

    public function show(Project $project)
    {
        // Auto-fetching method
        return view('projects.show', compact('project'));
    }

    public function create() {

        return view('projects.create');
    }
    
    public function store()
    {

        $validated = request()->validate([
            'title' => 'required|min:3|max:25',
            'description' => 'required|min:10|max:255'
        ]);

        Project::create($validated);

        // Project::create([
        //     'title' => request('title'),
        //     'description' => request('description')
        // ]);

        return redirect('/projects');
    }


    public function edit($id)
    {
        // Manual fetching method
        $project = Project::findOrFail($id);

        return view('projects.edit', compact('project'));
    }

    public function update(Project $project)
    {

        $project->update(request(['title','description']));

        // $project->title = request('title');
        // $project->description = request('description');
        // $project->save();
        
        return redirect("/projects/{$project->id}");
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect('/projects');
    }
}
