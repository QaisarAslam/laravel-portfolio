<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\ContactController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('reset', function(){

    \Artisan::call('migrate:fresh --seed');

    $req = request()->server();
    $custom_url = $req['DOCUMENT_ROOT'].$req['REQUEST_URI'];

    // (A) SOURCE & TARGET
    $from = '"'.str_replace(['/', 'reset'], ['\\\\', 'public'], ($custom_url.'/uploads/images2')).'"';
    $to = '"'.str_replace(['/', 'reset'], ['\\\\', 'public'], ($custom_url.'/uploads/images')).'"';
    // dd($from);

    // (B) COPY COMMAND
    $os = strtolower(PHP_OS_FAMILY); // PHP 7.2 & ABOVE ONLY
    $cmd = "";
    if ($os == "windows") { $cmd = "echo All | Xcopy $from $to /E/H/C/I"; }
    if ($os =="linux") { $cmd = "cp -R $from $to"; }
    if ($cmd=="") { exit("Error copying"); }

    // (C) RUN!
    echo $cmd;
    echo "<br />";
    echo exec($cmd);
    return redirect()->route('index')->with('error', 'Congrats! Portfolio reset successfully.');

});

// Frontend Route
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::post('contact-us', [HomeController::class, 'contactUs'])->name('contact-us');
Route::get('/projects/{project:slug}', [HomeController::class, 'projectDetails'])->name('project.details');

//Auth Routes
Auth::routes(['register' => false]);

// Auth Protected Routes
Route::middleware(['PreventBackHistory', 'auth'])->group(function(){
    require 'admin.php';
});

Route::fallback(function (Request $request) {
    // abort(403, 'Page not found!');
    return redirect()->route('index')->with('error', 'Sorry! Page did not find.');
});
