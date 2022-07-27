<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Artisan;

class AdminController extends Controller
{
    /**
     * Show the application admin dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function clearAll()
    {
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('event:clear');
        Artisan::call('optimize:clear');
        Artisan::call('route:clear');
        Artisan::call('view:clear');
        Artisan::call('clear-compiled');
        // Artisan::call('config:cache');
        // Artisan::call('view:cache');
        $homeURL = url('/');

        return 'Views Cleared, Routes Cleared, Cache Cleared, and Config Cleared Successfully ! <a href="'.$homeURL.'">Go Back To Home</a>';
    }

    public function index()
    {
        return view('admin.dashboard');
    }
}
