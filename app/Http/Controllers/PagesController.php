<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class PagesController extends Controller
{
    public function home()
    {
        $projects = Project::all();

        return view('projects.index', [
            'projects' => $projects
        ]);
    }

    public function contact()
    {
        return view('contact');
    }

    public function about()
    {
        return view('about');
    }
}
