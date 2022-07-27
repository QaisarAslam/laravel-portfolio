<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactUs;
use App\Http\Requests\HomeRequests;
use App\Models\Profile;
use App\Models\Project;
use App\Models\Testimonial;
use App\Models\Client;
use App\Models\Skill;

class HomeController extends Controller
{
    public function index()
    {
        // $profile = Profile::partialSelect()->firstOrFail();
        $profile = Profile::partialSelect()->first();
        if(!$profile)
        {
            return redirect('/reset');
        }
        $projects = Project::where('visibility', 'public')->orderBy('id', 'desc')->take(8)->get();
        $testimonials = Testimonial::where('visibility', 'public')->orderBy('id', 'desc')->get();
        $clients = Client::where('visibility', 'public')->orderBy('id', 'desc')->get();
        $skills = Skill::where('visibility', 'public')->orderBy('id', 'desc')->get();

    	return view('frontend.index', compact('profile', 'testimonials', 'clients', 'projects', 'skills'));
    }
    
    public function projectDetails($slug)
    {
    	$project = Project::with('category')->findOrFail($slug);
    	$profile = Profile::partialSelect()->firstOrFail();
    	return view('frontend.projects.show', compact('profile', 'project'));
    }

    public function contactUs(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:50',
            'email' => 'required|string|min:3|max:50|email',
            'message' => 'required|string|min:3'
        ]);

        Mail::to($request->email)->send(new ContactUs($request->except('_token')));

        return 'Message sent successfully! We\'ll get back to you soon!';
    }
}
