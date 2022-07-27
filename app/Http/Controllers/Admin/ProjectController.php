<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Category;
use App\Models\Framework;
use App\Models\Tag;
use App\Http\Requests\ProjectRequest;
use App\Services\FileService;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
	public function shows()
	{
		return view('admin.projects.show');
	}

	public function index()
	{
		$projects = Project::withTrashed()->get();

		$categories = Category::select(['id', 'name'])->get();

		$frameworks = Framework::select(['id', 'name'])->get();

		$tags = Tag::select(['id', 'name'])->get();

		return view('admin.projects.index', compact('projects', 'categories', 'frameworks', 'tags'));
	}

	public function table()
	{
		$projects = Project::withTrashed()->get();

		$categories = Category::select(['id', 'name'])->orderByDesc('id')->get();

		$frameworks = Framework::select(['id', 'name'])->orderByDesc('id')->get();

		return view('admin.projects.table', compact('projects', 'categories', 'frameworks'));
	}

	public function store(ProjectRequest $request)
	{
		$validatedData = $request->validated();

		$slug = Str::slug($validatedData['name']);

		if ($request->hasFile('featured_image'))
		{
			Arr::pull($validatedData, 'featured_image');

			$path = 'uploads/images/projects/featured-image/';

			$featuredImage = new FileService;

			$featuredImage = $featuredImage->uploadFile($request->file('featured_image'), $path);
		}

		if ($request->hasFile('gallery_images'))
		{
			Arr::pull($validatedData, 'gallery_images');

			$galleryImagesArray = [];

			foreach ($request->file('gallery_images') as $galleryImage)
			{
				$path = 'uploads/images/projects/gallery-images/';

				$galleryImages = new FileService;

				$galleryImages = $galleryImages->uploadFile($galleryImage, $path);

				// $galleryImagesArray = Arr::prepend($galleryImagesArray, $finalGalleryImageName);

				$galleryImagesArray[] = $galleryImages;
			}
			$gallaryImagesString = implode(', ', $galleryImagesArray);
		}

		$project = Project::create($validatedData + [

			'slug' => $slug,

			'featured_image' => $featuredImage ?? null,

			'gallery_images' => $gallaryImagesString ?? null,
		]);

		$project->tags()->attach($validatedData['tags']);

		if($request->ajax())
		{
			return response()->json([
				'type' => 'success',
				'msg' => 'Project Added Successfully !',
			]);
		}

		return redirect()->route('projects.index')->with('success', 'Project Added Successfully !');
	}

	public function edit(Project $project)
	{
		$categories = Category::select(['id', 'name'])->get();

		$frameworks = Framework::select(['id', 'name'])->get();

		$tags = Tag::all();

		return view('admin.projects.edit-request', compact('project', 'categories', 'frameworks', 'tags'));
	}

	public function update(ProjectRequest $request, Project $project)
	{
		$validatedData = $request->validated();

		$oldFeaturedImage = $project->featured_image;

		$oldGalleryImages = $project->gallery_images;

		if ($request->hasFile('featured_image'))
		{
			Arr::pull($validatedData, 'featured_image');

			$path = 'uploads/images/projects/featured-image/';

			$featuredImage = new FileService;

			$featuredImage = $featuredImage->uploadFile($request->file('featured_image'), $path);
		}

		if (isset($featuredImage))
		{
			$deleteFeaturedImage = new FileService;

			$deleteFeaturedImage = $deleteFeaturedImage->deleteFile($oldFeaturedImage);
		}

		if ($request->hasFile('gallery_images'))
		{
			Arr::pull($validatedData, 'gallery_images');

			$galleryImagesArray = [];

			foreach ($request->file('gallery_images') as $galleryImage)
			{
				$path = 'uploads/images/projects/gallery-images/';

				$galleryImages = new FileService;

				$galleryImages = $galleryImages->uploadFile($galleryImage, $path);

				// $galleryImagesArray = Arr::prepend($galleryImagesArray, $finalGalleryImageName);

				$galleryImagesArray[] = $galleryImages;
			}
			$galleryImagesString = implode(', ', $galleryImagesArray);
		}

		if(isset($galleryImagesString))
		{
			$oldGalleryImagesArray = explode(', ', $oldGalleryImages);

			foreach ($oldGalleryImagesArray as $oldGalleryImage)
			{
				$deleteGalleryImages = new FileService;

				$deleteGalleryImages = $deleteGalleryImages->deleteFile($oldGalleryImage);
			}
		}

		$project->update($validatedData	+ [

			'featured_image' => $featuredImage ?? $oldFeaturedImage,

			'gallery_images' => $galleryImagesString ?? $oldGalleryImages,
		]);

		$project->tags()->sync($request->tags);

		if($request->ajax())
		{
			return response()->json([
				'type' => 'success',
				'msg' => 'Project Updated Successfully !'
			]);
		}

		return redirect()->route('projects.index')->with('success', 'Project Updated Successfully !');
	}

	public function destroy($project)
	{
		$project = Project::where('id', $project)->firstOrFail();

		if(request()->ajax())
    	{
    		if ($project->delete())
    		{
    			return response()->json([
    				'type' => 'success',
    				'msg' => 'Project moved to trash !'
    			]);
    		}
    		return response()->json([
    			'type' => 'error',
    			'msg' => 'Sorry! Project not found.'
    		]);
    	}
    	if ($project->delete())
    	{
    		return redirect()->route('projects.index')->with('success', 'Project moved to trash !');
    	}

    	return redirect()->route('projects.index')->with('error', 'Sorry! Project not found.');
	}

	public function restore($project)
	{
		$project = Project::onlyTrashed()->where('id', $project)->firstOrFail();

		if(request()->ajax())
    	{
    		if ($project->restore())
    		{
    			return response()->json([
    				'type' => 'success',
    				'msg' => 'Project Restored Successfully !'
    			]);
    		}
    		return response()->json([
    			'type' => 'error',
    			'msg' => 'Sorry! Project for restoration not found.'
    		]);
    	}
    	if ($project->restore())
    	{
    		return redirect()->route('projects.index')->with('success', 'Project Restored Successfully !');
    	}

    	return redirect()->route('projects.index')->with('error', 'Sorry! Project for restoration not found');
	}

	public function forceDestroy($project)
	{
		$project = Project::onlyTrashed()->where('id', $project)->firstOrFail();

		$featuredImage = $project->featured_image;

		$galleryImages = $project->gallery_images;

		if ($featuredImage != null)
		{
			(new FileService)->deleteFile($featuredImage);
		}

		if($galleryImages)
		{
			$galleryImagesArray = explode(', ', $galleryImages);

			foreach ($galleryImagesArray as $galleryImage)
			{
				(new FileService)->deleteFile($galleryImage);
			}
		}

		if(request()->ajax())
		{
			if ($project->forceDelete())
			{
				return response()->json([
					'type' => 'success',
					'msg' => 'Project Deleted !'
				]);
			}
			return response()->json([
				'type' => 'error',
				'msg' => 'Sorry! Project not found.'
			]);
		}

		if ($project->forceDelete())
		{
			return redirect()->route('projects.index')->with('success', 'Project Deleted !');
		}

		return redirect()->route('projects.index')->with('error', 'Sorry! Project not found.');
	}
}
