<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use Illuminate\Support\Facades\Mail;
use App\Events\ProjectCreated;

class ProjectsController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');
    //    $this->middleware('auth')->only(['create', 'store']);
    //    $this->middleware('auth')->except(['index']);

    }

    public function index()
    {
        return view('projects.index', [
            'projects' => auth()->user()->projects
        ]);
    }

    public function show(Project $project)
    {
        // -- Ways to handle authorization --
        // Simple way
        $this->authorize('manage', $project);

        // Gate way
        //abort_if(\Gate::denies('manage', $project), 403);
        // abort_unless(\Gate::allows('manage', $project), 403);

        // without using Policy
        //abort_if($project->owner_id !== auth()->id(), 403);
        //abort_unless($project->owner_id == auth()->id(), 403)

        // Auto-fetching method
        return view('projects.show', compact('project'));
    }

    public function create() {

        return view('projects.create');
    }

    public function store()
    {

        $validated = $this->validateProject();

        $validated['owner_id'] = auth()->id();

        $project = Project::create($validated);

        // Project::create([
        //     'title' => request('title'),
        //     'description' => request('description')
        // ]);

        // Send email after creating a project
        // Mail::to($project->owner->email)->send(
        //     new ProjectCreated($project)
        // );
        
        // Fire a event when project has been created (For, for example, send a email)
        event(new ProjectCreated($project));

        // Send a flash notification to view (with helper function stored in App/helpers.php file)
        flash('Project successfully created');

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
        $this->authorize('manage', $project);

        $project->update($this->validateProject());

        // $project->title = request('title');
        // $project->description = request('description');
        // $project->save();

        return redirect("/projects/{$project->id}");
    }

    public function destroy(Project $project)
    {
        $this->authorize('manage', $project);

        $project->delete();

        return redirect('/projects');
    }

    protected function validateProject()
    {
        return request()->validate([
            'title' => 'required|min:3|max:25',
            'description' => 'required|min:10|max:255'
        ]);
    }
}
