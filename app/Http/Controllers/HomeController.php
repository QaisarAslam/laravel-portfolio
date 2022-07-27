<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Project;
use App\Models\Testimonial;
use App\Models\Client;

class HomeController extends Controller
{
    public function index()
    {
        $profile = Profile::partialSelect()->firstOrFail();
        $projects = Project::where('visibility', 'public')->orderBy('id', 'desc')->take(8)->get();
        $testimonials = Testimonial::where('visibility', 'public')->orderBy('id', 'desc')->get();
        $clients = Client::where('visibility', 'public')->orderBy('id', 'desc')->get();

        return view('frontend.index', compact('profile', 'testimonials', 'clients', 'projects'));
    }
}
