<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class HomeController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->take(6)->get();
        return view('website.home', compact('projects'));
    }

    public function about()
    {
        return view('website.about');
    }

    public function projects()
    {
        $projects = Project::latest()->paginate(6);
        return view('website.projects', compact('projects'));
    }
}
