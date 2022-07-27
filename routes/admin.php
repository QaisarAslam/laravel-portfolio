<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FrameworkController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\TestimonialController;

// Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->group(function () {
Route::prefix('admin')->group(function () {
	Route::get('clear-all', [AdminController::class, 'clearAll']);
	Route::get('/dashboard', [AdminController::class, 'index']);
	Route::get('/categories/table', [CategoryController::class, 'table'])->name('categories.table');
	Route::put('/categories/restore/{category}', [CategoryController::class, 'restore']);
	Route::delete('/categories/force-delete/{category}', [CategoryController::class, 'forceDestroy']);
	Route::get('/frameworks/table', [FrameworkController::class, 'table'])->name('frameworks.table');
	Route::put('/frameworks/restore/{framework}', [FrameworkController::class, 'restore']);
	Route::delete('/frameworks/force-delete/{framework}', [FrameworkController::class, 'forceDestroy']);
	Route::get('/clients/table', [ClientController::class, 'table'])->name('clients.table');
	Route::put('/clients/restore/{client}', [ClientController::class, 'restore']);
	Route::delete('/clients/force-delete/{client}', [ClientController::class, 'forceDestroy']);
	Route::get('/projects/table', [ProjectController::class, 'table'])->name('projects.table');
	Route::put('/projects/restore/{project}', [ProjectController::class, 'restore']);
	Route::delete('/projects/force-delete/{project}', [ProjectController::class, 'forceDestroy']);
	Route::get('/services/table', [ServiceController::class, 'table'])->name('services.table');
	Route::put('/services/restore/{service}', [ServiceController::class, 'restore']);
	Route::delete('/services/force-delete/{service}', [ServiceController::class, 'forceDestroy']);
	Route::get('/skills/table', [SkillController::class, 'table'])->name('skills.table');
	Route::put('/skills/restore/{skill}', [SkillController::class, 'restore']);
	Route::delete('/skills/force-delete/{skill}', [SkillController::class, 'forceDestroy']);
	Route::get('/tags/table', [TagController::class, 'table'])->name('tags.table');
	Route::put('/tags/restore/{tag}', [TagController::class, 'restore']);
	Route::delete('/tags/force-delete/{tag}', [TagController::class, 'forceDestroy']);
	Route::get('/testimonials/table', [TestimonialController::class, 'table'])->name('testimonials.table');
	Route::put('/testimonials/restore/{testimonial}', [TestimonialController::class, 'restore']);
	Route::delete('/testimonials/force-delete/{testimonial}', [TestimonialController::class, 'forceDestroy']);
	Route::resources([
		'categories' => CategoryController::class,
		'frameworks' => FrameworkController::class,
		'tags' => TagController::class,
		'profiles' => ProfileController::class,
		'skills' => SkillController::class,
		'services' => ServiceController::class,
		'projects' => ProjectController::class,
		'clients' => ClientController::class,
		'testimonials' => TestimonialController::class,
	]);
});