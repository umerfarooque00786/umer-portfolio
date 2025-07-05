<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Message;


class AdminController extends Controller
{
    public function dashboard()
    {
        $projectsCount = Project::count();
        $messagesCount = Message::count();
        $recentProjects = Project::latest()->take(5)->get();
        $recentMessages = Message::latest()->take(5)->get();

        return view('admin.dashboard', compact('projectsCount', 'messagesCount', 'recentProjects', 'recentMessages'));
    }
}
